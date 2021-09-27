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
       // dd($data);
        $prepare = $this->prepare(
            "INSERT INTO $this->db 
                (
                nome, 
                empresa,
                identificacao,
                telefone,
                endereco,
                email,
                senha,
                logo,
                status,
                tipo,
                segmento,
                tipo_identificacao        
                ) 
                VALUES 
                (
                :nome, 
                :empresa,
                :identificacao,
                :telefone,
                :endereco,
                :email,
                :senha,
                :logo,
                :status,
                :tipo,
                :segmento,
                :tipo_identificacao
                )
                ");

        $prepare->bindValue(':nome',$data['nome']);
        $prepare->bindValue(':empresa',$data['empresa']);
        $prepare->bindValue(':identificacao',$data['identificacao'] ?? '');
        $prepare->bindValue(':telefone',$data['telefone']);
        $prepare->bindValue(':endereco',$data['endereco']);
        $prepare->bindValue(':email',$data['email']);
        $prepare->bindValue(':senha',$data['senha']);
        $prepare->bindValue(':logo',$data['logo']);
        $prepare->bindValue(':status',$data['status']);
        $prepare->bindValue(':tipo',$data['tipo']);
        $prepare->bindValue(':segmento',$data['segmento'] ?? '');
        $prepare->bindValue(':tipo_identificacao',$data['tipo_identificacao']);

        return $prepare->execute();

    }

    public function update(array $data){
                $prepare = $this->prepare("UPDATE $this->db SET 
                    nome = :nome,
                    empresa = :empresa, 
                    identificacao = :identificacao, 
                    telefone = :telefone, 
                    endereco = :endereco,
                    email = :email, 
                    logo = :logo, 
                    status = :status, 
                    tipo = :tipo, 
                    segmento = :segmento, 
                    tipo_identificacao = :tipo_identificacao 
                    WHERE 
                    id = :id
                ");

        $prepare->bindValue(':nome',$data['nome']);
        $prepare->bindValue(':empresa',$data['empresa']);
        $prepare->bindValue(':identificacao',$data['identificacao'] ?? '');
        $prepare->bindValue(':telefone',$data['telefone']);
        $prepare->bindValue(':endereco',$data['endereco']);
        $prepare->bindValue(':email',$data['email']);
        $prepare->bindValue(':logo',$data['logo']);
        $prepare->bindValue(':status',$data['status']);
        $prepare->bindValue(':tipo',$data['tipo']);
        $prepare->bindValue(':segmento',$data['segmento'] ?? '');
        $prepare->bindValue(':tipo_identificacao',$data['tipo_identificacao']);
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