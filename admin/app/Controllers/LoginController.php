<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Login;
use League\Plates\Engine;

class LoginController extends ValidadeLogin
{
    private $view;
    private $view_home;
    private $model;

    public function __construct()
    {
        $this->model = new Login();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/login', "php");
        $this->view_home = Engine::create(__DIR__ . '/../../storage/views/home', "php");
    }

    public function index()
    {
        if(isset($_SESSION) && !empty($_SESSION['user'])){
            redirect(url('home'));
        }

        echo $this->view->render('index', [
            'title' => 'Login Admin | '. SITE,
        ]);
    }

    public function login(array $request)
    {
        $login = $this->model->getLogin($request);

        if($login){
            $_SESSION['user'] = [
                'id' => $login->id,
                'name' => $login->nome,
                'email' => $login->usuario,
                'admin' => true
            ];

            flashMessages("success", "Logado com sucesso");
            redirect(url('home'));
        }

    }

    public function logout()
    {
        session_destroy();
        redirect(url('/'));

    }

}