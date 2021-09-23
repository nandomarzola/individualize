<?php

namespace App\Models;

class Partners extends Model
{
    private $db = 'i9_parceiros';

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

        $prepare = $this->prepare("INSERT INTO $this->db (imagem, nome, link, descricao) VALUES (:imagem, :nome, :link, :descricao)");

        $prepare->bindValue(':imagem',$data['imagem']);
        $prepare->bindValue(':nome',$data['nome']);
        $prepare->bindValue(':link',$data['link']);
        $prepare->bindValue(':descricao', $data['descricao']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            imagem = :imagem,
            descricao = :descricao, 
            link = :link,
            descricao = :descricao 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':imagem', $data['imagem']);
        $prepare->bindValue(':nome', $data['nome']);
        $prepare->bindValue(':link', $data['link']);
        $prepare->bindValue(':descricao', $data['descricao']);
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