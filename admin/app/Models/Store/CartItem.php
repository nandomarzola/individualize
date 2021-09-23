<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class CartItem extends Model
{
    private $db = 'tbl_loja_b2b_carrinho_item';

    public function findById(string $id) {

        $query = "select * from $this->db where loja_b2b_carrinho_item = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function findByCart(int $cart) {

        $query = "select * from $this->db where loja_b2b_carrinho = '$cart'";

        return $this->query($query)->fetchAll();

    }

    public function save(array $data){


        $prepare = $this->prepare("INSERT INTO $this->db (
            loja_b2b_carrinho,
            loja_b2b_peca,
            qtde,
            valor_unitario
        ) VALUES 
        (
            :loja_b2b_carrinho,
            :loja_b2b_peca, 
            :qtde, 
            :valor_unitario
        )");

        $prepare->bindValue(':loja_b2b_carrinho',$data['loja_b2b_carrinho']);
        $prepare->bindValue(':loja_b2b_peca',$data['loja_b2b_peca']);
        $prepare->bindValue(':qtde',$data['qtde']);
        $prepare->bindValue(':valor_unitario',$data['valor_unitario']);

        return $prepare->execute();
    }

    public function saveKit(array $data){


        $prepare = $this->prepare("INSERT INTO $this->db (
            loja_b2b_carrinho,
            loja_b2b_peca,
            qtde,
            valor_unitario,
            loja_b2b_kit_peca
        ) VALUES 
        (
            :loja_b2b_carrinho,
            :loja_b2b_peca, 
            :qtde, 
            :valor_unitario,
            :loja_b2b_kit_peca 
        )");

        $prepare->bindValue(':loja_b2b_carrinho',$data['loja_b2b_carrinho']);
        $prepare->bindValue(':loja_b2b_peca',$data['loja_b2b_peca']);
        $prepare->bindValue(':qtde',$data['qtde']);
        $prepare->bindValue(':valor_unitario',$data['valor_unitario']);
        $prepare->bindValue(':loja_b2b_kit_peca',$data['loja_b2b_kit_peca']);

        return $prepare->execute();
    }

}