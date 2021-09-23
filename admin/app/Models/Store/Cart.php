<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class Cart extends Model
{
    private $db = 'tbl_loja_b2b_carrinho';

    public function findById(string $id) {

        $query = "select * from $this->db where loja_b2b_carrinho = '$id'";

        return $this->query($query)->fetch();

    }

    public function findAll(int $loja_b2b, int $client) {

        $query = "select * from $this->db where loja_b2b = '$loja_b2b' AND loja_b2b_cliente = '$client'";

        return $this->query($query)->fetchAll();

    }

    public function find(int $loja_b2b, int $client, $limit, $offset) {

        $query = "select * from $this->db where loja_b2b = '$loja_b2b' AND loja_b2b_cliente = '$client' ORDER BY loja_b2b_carrinho DESC LIMIT $limit OFFSET $offset";

        return $this->query($query)->fetchAll();

    }

    public function countRegisters(int $loja_b2b, int $client) {

        $query = "select count(*) from $this->db where loja_b2b = '$loja_b2b' AND loja_b2b_cliente = '$client'";

        return $this->query($query)->fetch();

    }

    public function update($loja_b2b, $client, $id_order)
    {

        $prepare = $this->prepare("UPDATE $this->db SET aberto = false, gera_pedido = false WHERE loja_b2b_carrinho = :loja_b2b_carrinho and loja_b2b = :loja_b2b and loja_b2b_cliente = :loja_b2b_cliente");

        $prepare->bindValue(':loja_b2b', $loja_b2b);
        $prepare->bindValue(':loja_b2b_cliente', $client);
        $prepare->bindValue(':loja_b2b_carrinho', $id_order);

        return $prepare->execute();


    }

    public function save(array $data){

        $prepare = $this->prepare("INSERT INTO $this->db (
            loja_b2b,
            loja_b2b_cliente
        ) VALUES 
        (
            :loja_b2b,
            :loja_b2b_cliente
        )");

        $prepare->bindValue(':loja_b2b', LOJA_B2B);
        $prepare->bindValue(':loja_b2b_cliente',$data['loja_b2b_cliente']);

        $prepare->execute();

        return $this->lastInsert();
    }

}