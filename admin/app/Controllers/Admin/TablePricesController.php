<?php
namespace App\Controllers\Admin;

use League\Plates\Engine;

class TablePricesController extends AuthController
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->existAdmin();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/table_price', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index(): void
    {
        echo $this->view->render('index', [
            'title' => 'Tabela de Preços | '. SITE,
        ]);
    }

    public function error(array $error): void
    {
        echo $this->view_error->render('404', [
            'title' => 'Error | '. SITE,
        ]);
    }




}