<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class SingleLogin extends Model
{
    private $db = 'tbl_login_unico';

    public function getSingleLogin(string $cookie_login_unico, $posto){

        $query = "select * from $this->db where login_unico = '$cookie_login_unico' and distrib_total is false and compra_peca is true and ativo is true and posto != '$posto'";

        return (object) $this->query($query)->fetch();
    }

}
