<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class ClientStore extends Model
{
    private $db = 'tbl_loja_b2b_cliente';

    public function findById(string $id) {

        $query = "select * from $this->db where loja_b2b_cliente = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function findByEmail(string $email) {

        $query = "select * from $this->db where email LIKE '%$email%'";


        return (object) $this->query($query)->fetch();

    }

    public function save(array $data){

        $prepare = $this->prepare("INSERT INTO $this->db (
            posto,
            loja_b2b,
            cidade,
            nome,
            email
        ) VALUES 
        (
            :posto,
            :loja_b2b, 
            :cidade, 
            :nome, 
            :email
        )");

        $prepare->bindValue(':loja_b2b', $data['loja_b2b']);
        $prepare->bindValue(':posto',$data['posto']);
        $prepare->bindValue(':cidade',$data['cidade']);
        $prepare->bindValue(':nome',$data['nome']);
        $prepare->bindValue(':email',$data['email']);

        $prepare->execute();

        return $this->lastInsert();
    }

}