<?php

namespace App\Models;

class SubCategories extends Model
{
    private $db = 'i9_subcategorias';
    private $db_categories = 'i9_categorias';

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

        $query = "select sub_cat.*, cat.nome as categoria_nome from $this->db as sub_cat LEFT JOIN $this->db_categories as cat ON cat.id = sub_cat.id_categoria $search LIMIT $limit OFFSET $offset";

        return (object) $this->query($query)->fetchAll();

    }

    public function findAll() {

        $query = "select * from $this->db ";

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

        $prepare = $this->prepare("INSERT INTO $this->db (nome, id_categoria) VALUES (:nome, :id_categoria)");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':id_categoria', $data['id_categoria']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            id_categoria = :id_categoria,
            nome = :nome 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':nome', $data['name']);
        $prepare->bindValue(':id_categoria', $data['id_categoria']);
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