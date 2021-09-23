<?php

namespace App\Models\Store;

use App\Models\Admin\Model;

class Products extends Model
{
    private $db = 'tbl_loja_b2b_peca';
    private $db_kit = 'tbl_loja_b2b_kit_peca';
    private $store = LOJA_B2B;

    public function findById(int $peca) {

        $query = "select $this->db.* from $this->db where loja_b2b = $this->store AND peca = $peca;";

        return $this->query($query)->fetch();

    }

    public function findByIdPecaLoja(int $peca) {

        $query = "select $this->db.* from $this->db where loja_b2b = $this->store AND loja_b2b_peca = $peca;";

        return $this->query($query)->fetch();

    }

    public function findByIdKitLoja(int $peca) {

        $query = "select $this->db_kit.* from $this->db_kit where loja_b2b = $this->store AND loja_b2b_kit_peca = $peca;";

        return $this->query($query)->fetch();

    }

    public function find($limit, $offset, $search) {

        $query = "select $this->db.* from $this->db
                    where loja_b2b = $this->store $search
                    LIMIT $limit OFFSET $offset";

        return $this->query($query)->fetchAll();

    }

    public function findKit($limit, $offset, $search) {

        $query = "select $this->db_kit.* from $this->db_kit
                    where loja_b2b = $this->store $search
                    LIMIT $limit OFFSET $offset";

        return $this->query($query)->fetchAll();

    }

    public function countRegistersKit($search) {

        $query = "select count($this->db_kit.*) from $this->db_kit 
        where loja_b2b = $this->store $search";

        return $this->query($query)->fetchAll();

    }

    public function countRegisters($search) {

        $query = "select count($this->db.*) from $this->db 
        where loja_b2b = $this->store $search";

        return $this->query($query)->fetchAll();

    }

}