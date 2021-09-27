<?php

namespace App\Models;

class ImpressionHistory extends Model
{
    private $db = 'i9_impressoes';
    private $db_medicos = 'i9_medicos';
    private $db_formulas = 'i9_formulas';

    public function findById(int $id) {

        $query = "select * from $this->db where id = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function find($limit, $offset, $search) {

        $query = "select impressoes.*, medicos.nome as nome_medico, formulas.nome as nome_formula from $this->db as impressoes
                   LEFT JOIN $this->db_medicos as medicos ON medicos.id = impressoes.id_medico
                   LEFT JOIN $this->db_formulas as formulas ON formulas.id = impressoes.id_formula
                   where
                   medicos.nome is not null and 
                   formulas.nome is not null
                   $search LIMIT $limit OFFSET $offset";

        return (object) $this->query($query)->fetchAll();

    }

    public function findAll() {

        $query = "select * from $this->db";

        return (object) $this->query($query)->fetchAll();

    }

    public function countRegisters(string $search) {


        $query = "select count(*) as count from $this->db as impressoes
                   LEFT JOIN $this->db_medicos as medicos ON medicos.id = impressoes.id_medico
                   LEFT JOIN $this->db_formulas as formulas ON formulas.id = impressoes.id_formula
                   where
                   medicos.nome is not null and 
                   formulas.nome is not null
                   $search";

        return $this->query($query)->fetchAll();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            id_medico = :id_medico,
            id_formula = :id_formula,
            posologia = :posologia,
            quantidade = :quantidade,
            paciente = :paciente,
            cidade = :cidade
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':id_medico', $data['id_medico']);
        $prepare->bindValue(':id_formula', $data['id_formula']);
        $prepare->bindValue(':posologia', $data['posologia']);
        $prepare->bindValue(':quantidade', $data['quantidade']);
        $prepare->bindValue(':paciente', $data['paciente']);
        $prepare->bindValue(':cidade', $data['cidade']);
        $prepare->bindValue(':id', $data['id']);

        return $prepare->execute();

    }


}