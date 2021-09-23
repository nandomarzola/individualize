<?php

namespace App\Models;

class Glossary extends Model
{
    private $db = 'i9_glossario';

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

        $prepare = $this->prepare("INSERT INTO $this->db (nome, descricao) VALUES (:nome, :descricao)");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':descricao', $data['description']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            nome = :nome,
            descricao = :descricao 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':nome', $data['name']);
        $prepare->bindValue(':descricao', $data['description']);
        $prepare->bindValue(':id', $data['id']);

        return $prepare->execute();

    }

    public function destroy(int $id){

        $query = "delete from $this->db where id = :id";

        $prepare = $this->prepare($query);
        $prepare->bindValue(':id', $id);

        return $prepare->execute();

    }

}