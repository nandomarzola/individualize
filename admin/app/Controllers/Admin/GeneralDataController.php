<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Store;
use League\Plates\Engine;

class GeneralDataController extends AuthController
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->existAdmin();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/general_data', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index(): void
    {
        $store = new Store();
        $arrData = $store->findById(LOJA_B2B);

        if(!empty($arrData)){
            $arrData = json_decode($arrData->layout);
        }

        echo $this->view->render('index', [
            'title' => 'Dados Gerais | '. SITE,
            'data' => $arrData,
        ]);
    }

    public function update()
    {
        if($_POST){

            $store = new Store();
            $update = $store->update(json_encode($_POST), LOJA_B2B);

            if(!empty($update)){
                flashMessages("success", "Dados do layout salvas com sucesso");
                redirect(url('admin/general_data'));
            }else{
                flashMessages("success", "Ops, tivemos um problema, favor contactar o suporte!");
                redirect(url('admin/general_data'));
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