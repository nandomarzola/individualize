<?php
namespace App\Controllers;

use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class WebController extends ValidadeLogin
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->view = Engine::create(__DIR__ . '/../../storage/views/home', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function logout()
    {
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            unset($_SESSION['cart']);
            unset($_COOKIE['sess']);
        }

        return redirect(url(''));
    }

    public function error(array $error): void
    {
        echo $this->view_error->render('404', [
            'title' => 'Error | '. SITE,
        ]);
    }

}