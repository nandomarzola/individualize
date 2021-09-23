<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Categories;
use App\Models\SubCategories;
use Decimal\Decimal;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class SubCategoriesController extends ValidadeLogin
{
    private $view;
    private $model;
    private $model_categories;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new SubCategories();
        $this->model_categories = new Categories();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/sub-categories', "php");
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
            'title' => 'Sub-Categorias | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        $categories = $this->model_categories->findAll();

        echo $this->view->render('create', [
            'title' => 'Cadastrar Sub-Categoria | '. SITE,
            'categories' => $categories
        ]);
    }

    public function save(array $request)
    {
        $new_categorie = '';

        if(!empty($request['id_categoria']) && isset($request['name'])){
            $new_categorie = $this->model->save($request);
        }

        if(!empty($new_categorie)){
            flashMessages("success", "sub-categoria cadastrada com sucesso");
            redirect('sub-categories');
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar a sub-categoria, favor contactar o suporte');
            redirect('sub-categories');
        }

    }

    public function edit(array $data){

        $sub_categorie = $this->model->findById($data['id']);
        $categories = $this->model_categories->findAll();

        echo $this->view->render('edit', [
            'title' => 'Editar Sub-Categoria | '. SITE,
            'sub_categorie' => $sub_categorie,
            'categories' => $categories
        ]);
    }

    public function delete(array $data){

        $delete_categorie = '';

        if(!empty($data['id'])){
            $delete_categorie = $this->model->destroy($data['id']);
        }

        if(!empty($delete_categorie)){
            flashMessages("success", "sub-categoria  deletada com sucesso");
            redirect('sub-categories');
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar a sub-categoria , favor contactar o suporte');
            redirect('sub-categories');
        }
    }

    public function update(array $request)
    {
        $update_categorie = '';

        if(!empty($request['id_categoria']) && isset($request['name']) && isset($request['id'])){
            $update_categorie = $this->model->update($request);
        }

        if(!empty($update_categorie)){
            flashMessages("success", "sub-categoria  editada com sucesso");
            redirect('sub-categories');
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar a sub-categoria , favor contactar o suporte');
            redirect('sub-categories');
        }

    }

}