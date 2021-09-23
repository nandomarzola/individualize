<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class Login extends Model
{
    private $db = 'tbl_login_cookie';

    public function getLogin(string $token) {

        $query = "select * from $this->db where token = '$token'";

        return (object) $this->query($query)->fetch();

    }

}