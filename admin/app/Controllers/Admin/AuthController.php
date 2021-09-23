<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Login;
use App\Models\Admin\SingleLogin;

class AuthController
{
    public function existAdmin()
    {
        if(!isset($_SESSION['user']) || !$_SESSION['user']['admin']){
            $this->isAdmin();
        }

    }

    public function isAdmin()
    {
        $sess = $_COOKIE['sess'];
        //$sess = '1bb71a3f22a04289b9492e548e1232e2537610560849d4e35d935114954b1de956dd59003a9620119aa888c03e4a58d47e14f929c120091b33124c7ead831216';

        if(!empty($sess)){
            $model = new Login();
            $auth = $model->getLogin($sess);

            if(!empty($auth)){
                $this->validate($auth->cookie);
            }
            else
                return redirect('');
        }else{
            return redirect(LOGIN);
        }
    }

    private function validate($auth)
    {
        $auth = json_decode($auth);

        $cookie_login_unico = $auth->cook_login_unico;

        $model = new SingleLogin();
        $auth = $model->getSingleLogin($cookie_login_unico, POSTO);

        if(isset($auth->login_unico)){

            //session_start();

            $_COOKIE['autentication'] = [
                'admin' => true,
                'url' => '/loja/admin'
            ];

            $_SESSION['user'] = [
                'name' => $auth->nome,
                'email' => $auth->email,
                'post' => $auth->posto,
                'admin' => true,
                'factory' => 10
            ];

        }else{

            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
            }

            return redirect(LOGIN);

        }

    }

}