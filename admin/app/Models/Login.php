<?php

namespace App\Models;

class Login extends Model
{
    private $db = 'adm_usuarios';

    public function getLogin(array $data) {

        if(isset($data['email']) && isset($data['password'])){
            $usuario = $data['email'];
            $password = $data['password'];

            $query = "select * from $this->db where usuario = '$usuario' AND senha = '$password'";
        }

        return (object) $this->query($query)->fetch();

    }

}