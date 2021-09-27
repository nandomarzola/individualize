<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Institutional;
use Decimal\Decimal;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class InstitutionalController extends ValidateLoginController
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Institutional();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/institutional', "php");
    }

    public function index()
    {

        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "nome LIKE '%$descricao%'";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegisters($search);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->find(
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        echo $this->view->render('index', [
            'title' => 'Institucional | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function edit(array $data){

        $institutional = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Institucional | '. SITE,
            'institutional' => $institutional
        ]);
    }

    public function update(array $request)
    {
        $update_categorie = '';

        if(!empty($request['id_categoria']) && isset($request['name']) && isset($request['id'])){
            $update_categorie = $this->model->update($request);
        }

        if(!empty($update_categorie)){
            flashMessages("success", "Institucional  editado com sucesso");
            redirect('sub-categories');
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o Institucional , favor contactar o suporte');
            redirect('sub-categories');
        }

    }

}