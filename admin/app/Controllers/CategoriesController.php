<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Categories;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class CategoriesController extends ValidateLoginController
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Categories();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/categories', "php");
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
            'title' => 'Categorias | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {

        echo $this->view->render('create', [
            'title' => 'Cadastrar Categoria | '. SITE,
        ]);
    }

    public function save(array $request)
    {
        $new_categorie = '';

        if(!empty($request['cor']) && isset($request['name'])){
            $new_categorie = $this->model->save($request);
        }

        if(!empty($new_categorie)){
            flashMessages("success", "categoria cadastrada com sucesso");
            redirect(url('categories'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar a categoria, favor contactar o suporte');
            redirect(url('categories'));
        }

    }

    public function edit(array $data){

        $categorie = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Categoria | '. SITE,
            'categorie' => $categorie
        ]);
    }

    public function delete(array $data){

        $delete_categorie = '';

        if(!empty($data['id'])){
            $delete_categorie = $this->model->destroy($data['id']);
        }

        if(!empty($delete_categorie)){
            flashMessages("success", "categoria  deletada com sucesso");
            redirect(url('categories'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar a categoria , favor contactar o suporte');
            redirect(url('categories'));
        }
    }

    public function update(array $request)
    {
        $update_categorie = '';

        if(!empty($request['cor']) && isset($request['name']) && isset($request['id'])){
            $update_categorie = $this->model->update($request);
        }

        if(!empty($update_categorie)){
            flashMessages("success", "categoria editada com sucesso");
            redirect(url('categories'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar a categoria, favor contactar o suporte');
            redirect(url('categories'));
        }

    }

}