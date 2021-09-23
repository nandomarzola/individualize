<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Orders;
use App\Models\Admin\Products;
use CoffeeCode\Paginator\Paginator;
use League\Plates\Engine;

class OrdersController extends AuthController
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->existAdmin();
        $this->model = new Orders();
        $this->paginator = new Paginator();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/orders', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index(): void
    {
        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $search = "and nome LIKE '%".$_GET['search']."%'";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegisters(LOJA_B2B, $search);

        $this->paginator->pager($total_register['count'], 10, $page, "2");

        $orders = $this->model->findAll(
            LOJA_B2B,
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        foreach ($orders as $key=>$item){

            if($item['aberto'] && $item['gera_pedido']){
                $orders[$key]['status'] = 'Aguardando Aprovação';
            }elseif(!$item['aberto'] && $item['gera_pedido']){
                $orders[$key]['status'] = 'Pedido Faturado';
            }else{
                $orders[$key]['status'] = 'Pedido Cancelado';
            }
        }

        echo $this->view->render('index', [
            'title' => 'Pedidos | '. SITE,
            'data' => $orders,
            'paginator' => $this->paginator
        ]);
    }

    public function order(array $data){

        $id = filter_var($data['id'], FILTER_VALIDATE_INT);
        $valor_total = 0;
        $total_prod = 0;

        $order = $this->model->findById($id);
        $item = $this->model->findItem($id);

        if($order['aberto'] && $order['gera_pedido']){
            $order['status'] = 'Aguardando Aprovação';
        }elseif(!$order['aberto'] && $order['gera_pedido']){
            $order['status'] = 'Pedido Faturado';
        }else{
            $order['status'] = 'Pedido Cancelado';
        }

        foreach ($item as $key=>$value){

            if($value['loja_b2b_kit_peca']){
                $item[$key]['peca'] = (new Products())->findByIdKitLoja(LOJA_B2B, $value['loja_b2b_peca']);
            }else{
                $item[$key]['peca'] = (new Products())->findByStoreId(LOJA_B2B, $value['loja_b2b_peca']);
                $item[$key]['peca']['nome'] = $item[$key]['peca']['descricao'];
            }

            $total_prod += $value['qtde'];
            $valor_total +=  (double) ($value['qtde'] * $value['valor_unitario']);
        }

        //dd($item);

        echo $this->view->render('order', [
            'title' => 'Visualizar Pedido | '. SITE,
            'item' => $item,
            'order' => $order,
            'total_prod' => $total_prod,
            'valor_total' => $valor_total
        ]);
    }

    public function invoiceOrder(array $data){

            if(isset($data['order']) && !empty($data['order'])){

                $text = [
                    "send_product" => sendProducts($data['send_product']),
                    "method_pay" => removeCharcets(methodPay($data['method_pay'])),
                    "date_delivery" => $data['date_delivery'],
                    "observation" => $data['observation'],
                    'by' => $_SESSION['user']['name']
                ];

                $update = $this->model->invoice(json_encode($text), $data['order']);

                if ($update){
                    echo json_encode([
                        'success' => true,
                        'message' => 'Pedido faturado com sucesso'
                    ]);
                }else{
                    echo json_encode([
                        'success' => false,
                        'message' => 'Error ao faturar pedido, favor consultar o suporte!'
                    ]);
                }

            }else{
                echo json_encode([
                    'success' => false,
                    'message' => 'Error ao faturar pedido, favor consultar o suporte!'
                ]);
            }

    }

    public function cancelOrder(array $data){
        if(isset($data['order']) && !empty($data['order'])){
            $text = [
                "observation" => $data['observation'],
                'by' => $_SESSION['user']['name']
            ];

            $update = $this->model->cancel(json_encode($text), $data['order']);

            if ($update){
                echo json_encode([
                    'success' => true,
                    'message' => 'Pedido cancelado com sucesso'
                ]);
            }else{
                echo json_encode([
                    'success' => false,
                    'message' => 'Error ao cancelar pedido, favor consultar o suporte!'
                ]);
            }

        }else{
            echo json_encode([
                'success' => false,
                'message' => 'Error ao cancelar pedido, favor consultar o suporte!'
            ]);
        }
    }

    public function error(array $error): void
    {
        echo $this->view_error->render('404', [
            'title' => 'Error | '. SITE,
        ]);
    }




}