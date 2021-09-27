<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Users;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class UsersController extends ValidateLoginController
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Users();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/users', "php");
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
            'title' => 'Usuários | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        echo $this->view->render('create', [
            'title' => 'Cadastrar Usuários | '. SITE,
        ]);
    }

    public function save(array $request)
    {
        $new_user = '';

        if(!empty($request['senha'])){
            $request['senha'] = crypt($request['senha'], '');
        }

        if(!empty($request['nome']) && isset($request['usuario']) && isset($request['senha'])){
            $new_user = $this->model->save($request);
        }

        if(!empty($new_user)){
            flashMessages("success", "usuário cadastrado com sucesso");
            redirect(url('users'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o usuário, favor contactar o suporte');
            redirect(url('users'));
        }

    }

    public function edit(array $data)
    {

        $user = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Usuários | '. SITE,
            'user' => $user
        ]);
    }

    public function update(array $request)
    {
        $update_user = '';

        if(empty($request['senha'])){
            $user_pass = $this->model->findById($request['id']);
            $request['senha'] = $user_pass->senha;
        }

        if(isset($request['nome']) && isset($request['id'])){
            $update_user = $this->model->update($request);
        }

        if(!empty($update_user)){
            flashMessages("success", "usuário  editado com sucesso");
            redirect(url('users'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o usuário , favor contactar o suporte');
            redirect(url('users'));
        }

    }

}