<?php

namespace App\Models;

class Users extends Model
{
    private $db = 'adm_usuarios';

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

        $prepare = $this->prepare("INSERT INTO $this->db (nome, usuario, senha) VALUES (:nome, :usuario, :senha)");

        $prepare->bindValue(':nome',$data['nome']);
        $prepare->bindValue(':usuario', $data['usuario']);
        $prepare->bindValue(':senha', $data['senha']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            nome = :nome,
            usuario = :usuario,
            senha = :senha 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':nome', $data['nome']);
        $prepare->bindValue(':usuario', $data['usuario']);
        $prepare->bindValue(':senha', $data['senha']);
        $prepare->bindValue(':id', $data['id']);

        return $prepare->execute();

    }


}