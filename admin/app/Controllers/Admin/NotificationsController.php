<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Store;
use League\Plates\Engine;

class NotificationsController extends AuthController
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->existAdmin();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/notifications', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index()
    {
        $store = new Store();
        $data_store = $store->findById(LOJA_B2B);
        $data = json_decode($data_store['layout']);

        echo $this->view->render('index', [
            'title' => 'Notificações | '. SITE,
            'data' => $data
        ]);

    }

    public function save()
    {
        if($_POST && isset($_POST['email'])){
            $store = new Store();

            $data_store = $store->findById(LOJA_B2B);
            $layout = json_decode($data_store['layout']);
            $layout->email_loja = $_POST['email'];

            $update = $store->update(json_encode($layout), LOJA_B2B);

            if($update){
                flashMessages("success", "Configurações salvas com sucesso");
                redirect(url('admin/notifications'));
            }else{
                flashMessages("success", "Ops, tivemos um problema, favor contactar o suporte!");
                redirect(url('admin/notifications'));
            }

        }
    }

}