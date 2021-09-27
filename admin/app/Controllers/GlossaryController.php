<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Categories;
use App\Models\Glossary;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class GlossaryController extends ValidateLoginController
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Glossary();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/glossary', "php");
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
            'title' => 'Glossário | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        echo $this->view->render('create', [
            'title' => 'Cadastrar Glossário | '. SITE,
        ]);
    }

    public function save(array $request)
    {
        $new_glossary = '';

        if(!empty($request['description']) && isset($request['name'])){
            $new_glossary = $this->model->save($request);
        }

        if(!empty($new_glossary)){
            flashMessages("success", "glossário cadastrado com sucesso");
            redirect(url('glossary'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o glossário, favor contactar o suporte');
            redirect(url('glossary'));
        }

    }

    public function edit(array $data){

        $glossary = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Glossário | '. SITE,
            'glossary' => $glossary
        ]);
    }

    public function delete(array $data){

        $delete_glossary = '';

        if(!empty($data['id'])){
            $delete_glossary = $this->model->destroy($data['id']);
        }

        if(!empty($delete_glossary)){
            flashMessages("success", "glossário  deletado com sucesso");
            redirect(url('glossary'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar o glossário , favor contactar o suporte');
            redirect(url('glossary'));
        }
    }

    public function update(array $request)
    {
        $update_glossary = '';

        if(!empty($request['description']) || isset($request['name']) && isset($request['id'])){
            $update_glossary = $this->model->update($request);
        }

        if(!empty($update_glossary)){
            flashMessages("success", "glossário  editada com sucesso");
            redirect(url('glossary'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o glossário , favor contactar o suporte');
            redirect(url('glossary'));
        }

    }

}