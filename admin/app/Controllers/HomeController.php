<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use League\Plates\Engine;

class HomeController extends ValidateLoginController
{
    private $view;

    public function __construct()
    {
        $this->existAdmin();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/home', "php");
    }

    public function index()
    {
        echo $this->view->render('index', [
            'title' => 'Home | '. SITE,
        ]);
    }

}