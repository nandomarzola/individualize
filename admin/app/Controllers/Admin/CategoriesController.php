<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Categorie;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class CategoriesController extends AuthController
{
    private $view;
    private $view_error;
    private $model;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Categorie();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/categories', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index()
    {

        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "and descricao LIKE '%$descricao%'";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegisters(LOJA_B2B, $search);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->find(
            LOJA_B2B,
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

    public function new()
    {
        echo $this->view->render('create', [
            'title' => 'Nova Categoria | '. SITE,
        ]);
    }

    public function edit(array $data){

        $categorie = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Banner | '. SITE,
            'categorie' => $categorie
        ]);
    }

    public function save(array $data = null)
    {
       if($_POST){

          if(isset($data) && !empty($data['id'])){
            $new_cat = $this->model->update([
               'loja_b2b_categoria' => $data['id'],
               'descricao' => $_POST['description'],
            ]);
          }else{
            $new_cat = $this->model->save([
               'loja_b2b' => LOJA_B2B,
               'descricao' => $_POST['description'],
            ]);
          }

           if(!empty($new_cat)){
               flashMessages("success", "categoria cadastrada/editada com sucesso");
               redirect(url('admin/categories'));
           }else{
               flashMessages("error", 'Ocorreu um problema ao cadastrar/editar a categoria, favor contactar o suporte');
               redirect(url('admin/categories'));
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