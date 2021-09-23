<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Products;
use App\Models\Admin\Categorie;
use App\Models\Admin\ProductsGroup;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class ProductsController extends AuthController
{
    private $view;
    private $view_error;
    private $model;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Products();
        $this->model_product_group = new ProductsGroup();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/products', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index(): void
    {
        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $peca = (int) $_GET['search'] ?  "or peca = ".trim($_GET['search']) : '';
            $search = "and descricao LIKE '%$descricao%' $peca";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegisters(FABRICA, $search);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->find(
            FABRICA,
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        $model_categorie = new Categorie();
        $categories = $model_categorie->findAll(LOJA_B2B);

        echo $this->view->render('index', [
            'title' => 'Produtos | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register,
            'categories' => $categories
        ]);

    }

    public function productsStore(){
        
        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $peca = (int) $_GET['search'] ?  "or peca = ".trim($_GET['search']) : '';
            $search = "and descricao LIKE '%$descricao%' $peca";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegistersStore(LOJA_B2B, $search);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->findStore(
            LOJA_B2B,
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        $model_categorie = new Categorie();
        $categories = $model_categorie->findAll(LOJA_B2B);

        echo $this->view->render('product_store', [
            'title' => 'Produtos Vinculados | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register,
            'categories' => $categories
        ]);

    }

    public function productsGroup(){

        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $search = "and nome LIKE '%".$_GET['search']."%'";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model_product_group->countRegisters(LOJA_B2B, $search);

        $this->paginator->pager($total_register['count'], 10, $page, "2");

        $data = $this->model_product_group->find(
            LOJA_B2B,
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        $model_categorie = new Categorie();
        $categories = $model_categorie->findAll(LOJA_B2B);

        /*$categories[] = [
            'loja_b2b_categoria' => 5,
            'descricao' => 'categoria'
        ];*/

        echo $this->view->render('product_group', [
            'title' => 'Produtos Agrupados | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register,
            'categories' => $categories
        ]);

    }

    public function addProduct(array $data){

        if(isset($data['id_categorie']) && !empty($data['id_product'])){

            $peca = $this->model->findById($data['id_product']);
                
            if(!empty($peca['peca'])){

                $data = [
                    'peca' => $peca['peca'],
                    'loja_b2b' => LOJA_B2B,
                    'descricao' => $peca['descricao'],
                    'loja_b2b_categoria' => $data['id_categorie']
                ];


                $add_product = $this->model->save($data);

                if($add_product){
                    echo json_encode([
                        'success' => true,
                        'message' => 'Produto inserido com sucesso!'
                    ]);
                }else{
                    echo json_encode([
                        'success' => false,
                        'message' => 'Error ao cadastrar produto!'
                    ]);
                }

            }

        }

    }

    public function addProductGroup(array $data){

        if(!empty($data['id_categorie']) && !empty($data['name'] && !empty($data['array_product']))){

            $items  = [];

            foreach ($data['array_product'] as $product) {
                $items[] = $product['name'];
            }

           $data_product = [
                'name' => $data['name'],
                'categorie' => $data['id_categorie'],
                'description' => 'O produto é composto pelos items '.implode(' , ', $items)
            ];

            $add_product_group = $this->model_product_group->save($data_product);

            if($add_product_group){

                foreach ($data['array_product'] as $item){

                    $data_item = [
                        'loja_b2b_kit_peca' => $add_product_group,
                        'loja_b2b_peca' => $item['id'],
                        'qtde' => 1
                    ];

                    $create_item = $this->model_product_group->create_item($data_item);
                }

                if($create_item){
                    echo json_encode([
                        'success' => true,
                        'message' => 'Produto inserido com sucesso!'
                    ]);
                }else{

                    $this->model_product_group->delete($add_product_group);

                    echo json_encode([
                        'success' => false,
                        'message' => 'Error ao inserir produto, favor contactar o suporte'
                    ]);

                }

            }else{
                echo json_encode([
                    'success' => false,
                    'message' => 'Error ao inserir produto, favor contactar o suporte'
                ]);
            }

        }

    }

    public function error(array $error): void
    {
        echo $this->view_error->render('404', [
            'title' => 'Error | '. SITE,
        ]);
    }




}
