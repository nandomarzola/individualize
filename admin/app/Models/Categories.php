<?php

namespace App\Models;

class Categories extends Model
{
    private $db = 'i9_categorias';

    public function findById(int $id) {

        $query = "select * from $this->db where id = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function find($limit, $offset, $search) {

        if(!empty($search)){
            $search = ' where '.$search;
        }else{
            $search = '';
        }

        $query = "select * from $this->db $search LIMIT $limit OFFSET $offset";

        return (object) $this->query($query)->fetchAll();

    }

    public function findAll() {

        $query = "select * from $this->db";

        return (object) $this->query($query)->fetchAll();

    }

    public function countRegisters(string $search) {

        if(!empty($search)){
            $search = ' where '.$search;
        }

        $query = "select count(*) as count from $this->db  $search";

        return $this->query($query)->fetchAll();

    }

    public function save(array $data){

        $prepare = $this->prepare("INSERT INTO $this->db (nome, cor) VALUES (:nome, :cor)");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':cor', $data['cor']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            nome = :nome,
            cor = :cor 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':nome', $data['name']);
        $prepare->bindValue(':cor', $data['cor']);
        $prepare->bindValue(':id', $data['id']);

        return $prepare->execute();

    }

}