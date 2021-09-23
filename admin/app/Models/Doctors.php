<?php

namespace App\Models;

class Doctors extends Model
{
    private $db = 'i9_medicos';

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

    public function findDoctorSegment($segment, $limit, $offset, $search) {

        $whereSegment = '';

        if(empty($search)){
            $whereSegment = "where segmento = '$segment'";
        }

        $query = "select * from $this->db 
                  $whereSegment  
                  $search LIMIT $limit OFFSET $offset";

        return (object) $this->query($query)->fetchAll();

    }

    public function findSegmentCSV($segment) {

        $query = "select * from $this->db where segmento = '$segment'";

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

    public function countRegistersSelected(string $search, string $segment) {

        if(empty($search)){
            $search = "where segmento = '$segment'";
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
            id_medico = :id_medico,
            id_formula = :id_formula 
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':id_medico', $data['id_medico']);
        $prepare->bindValue(':id_formula', $data['id_formula']);
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