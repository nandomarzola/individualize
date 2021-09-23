<?php

namespace App\Models;

class Vehicles extends Model
{
    private $db = 'i9_veiculos';
    private $db_categories = 'i9_categorias';
    private $db_sub_categories = 'i9_subcategorias';

    public function findById(int $id) {

        $query = "select * from $this->db where id = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function find($limit, $offset, $search) {

        $query = "select veiculos.*, cat.nome as nome_categoria, cat_sub.nome as nome_categoria_sub from 
                    $this->db as veiculos
                    left join $this->db_categories as cat ON cat.id = veiculos.id_categoria
                    left join $this->db_sub_categories as cat_sub ON cat_sub.id = veiculos.id_subcategoria
                    where veiculos.ativo = '1' 
                    $search LIMIT $limit OFFSET $offset
                    ";

        return (object) $this->query($query)->fetchAll();

    }

    public function findAll() {

        $query = "select * from $this->db";

        return (object) $this->query($query)->fetchAll();

    }

    public function countRegisters(string $search) {


        if(!empty($search)){
            $search = str_replace('and', '', $search);
            $search = ' where '.$search;
        }

        $query = "select count(*) as count from $this->db as veiculos  $search";

        return $this->query($query)->fetchAll();

    }

    public function save(array $data){

        $prepare = $this->prepare(
            "INSERT INTO $this->db 
                    (
                    nome, 
                    descricao,
                    id_categoria,
                    id_subcategoria,
                    formulacao,
                    fabricar,
                    ativo,
                    excipiente1,
                    composicaoexcipiente1,
                    excipiente2,
                    composicaoexcipiente2,
                    excipiente3,
                    composicaoexcipiente3,
                    excipiente4,
                    composicaoexcipiente4,
                    excipiente5,
                    composicaoexcipiente5,
                    excipiente6,
                    composicaoexcipiente6,
                    excipiente7,
                    composicaoexcipiente7,
                    excipiente8,
                    composicaoexcipiente8,
                    excipiente9,
                    composicaoexcipiente9,
                    excipiente10,
                    composicaoexcipiente10,
                    excipiente11,
                    composicaoexcipiente11,
                    excipiente12,
                    composicaoexcipiente12,
                    excipiente13,
                    composicaoexcipiente13,
                    excipiente14,
                    composicaoexcipiente14,
                    excipiente15,
                    composicaoexcipiente15,
                    excipiente16,
                    composicaoexcipiente16,
                    excipiente17,
                    composicaoexcipiente17,
                    excipiente18,
                    composicaoexcipiente18,
                    excipiente19,
                    composicaoexcipiente19,
                    excipiente20,
                    composicaoexcipiente20
                    ) 
                    VALUES 
                    (
                    :nome, 
                    :descricao,
                    :id_categoria,
                    :id_subcategoria,
                    :formulacao,
                    :fabricar,
                    :ativo,
                    :excipiente1,
                    :composicaoexcipiente1,
                    :excipiente2,
                    :composicaoexcipiente2,
                    :excipiente3,
                    :composicaoexcipiente3,
                    :excipiente4,
                    :composicaoexcipiente4,
                    :excipiente5,
                    :composicaoexcipiente5,
                    :excipiente6,
                    :composicaoexcipiente6,
                    :excipiente7,
                    :composicaoexcipiente7,
                    :excipiente8,
                    :composicaoexcipiente8,
                    :excipiente9,
                    :composicaoexcipiente9,
                    :excipiente10,
                    :composicaoexcipiente10,
                    :excipiente11,
                    :composicaoexcipiente11,
                    :excipiente12,
                    :composicaoexcipiente12,
                    :excipiente13,
                    :composicaoexcipiente13,
                    :excipiente14,
                    :composicaoexcipiente14,
                    :excipiente15,
                    :composicaoexcipiente15,
                    :excipiente16,
                    :composicaoexcipiente16,
                    :excipiente17,
                    :composicaoexcipiente17,
                    :excipiente18,
                    :composicaoexcipiente18,
                    :excipiente19,
                    :composicaoexcipiente19,
                    :excipiente20,
                    :composicaoexcipiente20
                    )
                    ");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':descricao', $data['descricao']);
        $prepare->bindValue(':id_categoria', $data['id_categoria']);
        $prepare->bindValue(':id_subcategoria', $data['id_subcategoria']);
        $prepare->bindValue(':formulacao', $data['formulacao']);
        $prepare->bindValue(':fabricar', $data['fabricar']);
        $prepare->bindValue(':ativo', $data['ativo']);
        $prepare->bindValue(':excipiente1', !empty($data['excipiente1']) ? $data['excipiente1'] : null);
        $prepare->bindValue(':composicaoexcipiente1', $data['composicaoexcipiente1']);
        $prepare->bindValue(':excipiente2',!empty($data['excipiente2']) ? $data['excipiente2'] : null);
        $prepare->bindValue(':composicaoexcipiente2', $data['composicaoexcipiente2']);
        $prepare->bindValue(':excipiente3',!empty($data['excipiente3']) ? $data['excipiente3'] : null);
        $prepare->bindValue(':composicaoexcipiente3', $data['composicaoexcipiente3']);
        $prepare->bindValue(':excipiente4',!empty($data['excipiente4']) ? $data['excipiente4'] : null);
        $prepare->bindValue(':composicaoexcipiente4', $data['composicaoexcipiente4']);
        $prepare->bindValue(':excipiente5', !empty($data['excipiente5']) ? $data['excipiente5'] : null);
        $prepare->bindValue(':composicaoexcipiente5', $data['composicaoexcipiente5']);
        $prepare->bindValue(':excipiente6', !empty($data['excipiente6']) ? $data['excipiente6'] : null);
        $prepare->bindValue(':composicaoexcipiente6', $data['composicaoexcipiente6']);
        $prepare->bindValue(':excipiente7', !empty($data['excipiente7']) ? $data['excipiente7'] : null);
        $prepare->bindValue(':composicaoexcipiente7', $data['composicaoexcipiente7']);
        $prepare->bindValue(':excipiente8',!empty($data['excipiente8']) ? $data['excipiente8'] : null);
        $prepare->bindValue(':composicaoexcipiente8', $data['composicaoexcipiente8']);
        $prepare->bindValue(':excipiente9', !empty($data['excipiente9']) ? $data['excipiente9'] : null);
        $prepare->bindValue(':composicaoexcipiente9', $data['composicaoexcipiente9']);
        $prepare->bindValue(':excipiente10', !empty($data['excipiente10']) ? $data['excipiente10'] : null);
        $prepare->bindValue(':composicaoexcipiente10', $data['composicaoexcipiente10']);
        $prepare->bindValue(':excipiente11', !empty($data['excipiente11']) ? $data['excipiente11'] : null);
        $prepare->bindValue(':composicaoexcipiente11', $data['composicaoexcipiente11']);
        $prepare->bindValue(':excipiente12', !empty($data['excipiente12']) ? $data['excipiente12'] : null);
        $prepare->bindValue(':composicaoexcipiente12', $data['composicaoexcipiente12']);
        $prepare->bindValue(':excipiente13', !empty($data['excipiente13']) ? $data['excipiente13'] : null);
        $prepare->bindValue(':composicaoexcipiente13', $data['composicaoexcipiente13']);
        $prepare->bindValue(':excipiente14', !empty($data['excipiente14']) ? $data['excipiente14'] : null);
        $prepare->bindValue(':composicaoexcipiente14', $data['composicaoexcipiente14']);
        $prepare->bindValue(':excipiente15', !empty($data['excipiente15']) ? $data['excipiente15'] : null);
        $prepare->bindValue(':composicaoexcipiente15', $data['composicaoexcipiente15']);
        $prepare->bindValue(':excipiente16', !empty($data['excipiente16']) ? $data['excipiente16'] : null);
        $prepare->bindValue(':composicaoexcipiente16', $data['composicaoexcipiente16']);
        $prepare->bindValue(':excipiente17', !empty($data['excipiente17']) ? $data['excipiente17'] : null);
        $prepare->bindValue(':composicaoexcipiente17', $data['composicaoexcipiente17']);
        $prepare->bindValue(':excipiente18', !empty($data['excipiente18']) ? $data['excipiente18'] : null);
        $prepare->bindValue(':composicaoexcipiente18', $data['composicaoexcipiente18']);
        $prepare->bindValue(':excipiente19', !empty($data['excipiente19']) ? $data['excipiente19'] : null);
        $prepare->bindValue(':composicaoexcipiente19', $data['composicaoexcipiente19']);
        $prepare->bindValue(':excipiente20', !empty($data['excipiente20']) ? $data['excipiente20'] : null);
        $prepare->bindValue(':composicaoexcipiente20', $data['composicaoexcipiente20']);

        return $prepare->execute();

    }

    public function update(array $data){

        $prepare = $this->prepare("UPDATE $this->db SET 
            nome = :nome, 
            descricao = :descricao,
            id_categoria =:id_categoria,
            id_subcategoria = :id_subcategoria,
            formulacao = :formulacao,
            fabricar = :fabricar,
            ativo = :ativo,
            excipiente1 = :excipiente1,
            composicaoexcipiente1 = :composicaoexcipiente1,
            excipiente2 = :excipiente2,
            composicaoexcipiente2 = :composicaoexcipiente2,
            excipiente3 = :excipiente3,
            composicaoexcipiente3 = :composicaoexcipiente3,
            excipiente4 = :excipiente4,
            composicaoexcipiente4 = :composicaoexcipiente4,
            excipiente5 = :excipiente5,
            composicaoexcipiente5 = :composicaoexcipiente5,
            excipiente6 = :excipiente6,
            composicaoexcipiente6 = :composicaoexcipiente6,
            excipiente7 = :excipiente7,
            composicaoexcipiente7 = :composicaoexcipiente7,
            excipiente8 = :excipiente8,
            composicaoexcipiente8 = :composicaoexcipiente8,
            excipiente9 = :excipiente9,
            composicaoexcipiente9 = :composicaoexcipiente9,
            excipiente10 = :excipiente10,
            composicaoexcipiente10 = :composicaoexcipiente10,
            excipiente11 = :excipiente11,
            composicaoexcipiente11 = :composicaoexcipiente11,
            excipiente12 = :excipiente12,
            composicaoexcipiente12 = :composicaoexcipiente12,
            excipiente13 = :excipiente13,
            composicaoexcipiente13 = :composicaoexcipiente13,
            excipiente14 = :excipiente14,
            composicaoexcipiente14 = :composicaoexcipiente14,
            excipiente15 = :excipiente15,
            composicaoexcipiente15 = :composicaoexcipiente15,
            excipiente16 = :excipiente16,
            composicaoexcipiente16 = :composicaoexcipiente16,
            excipiente17 = :excipiente17,
            composicaoexcipiente17 = :composicaoexcipiente17,
            excipiente18 = :excipiente18,
            composicaoexcipiente18 = :composicaoexcipiente18,
            excipiente19 = :excipiente19,
            composicaoexcipiente19 = :composicaoexcipiente19,
            excipiente20 = :excipiente20,
            composicaoexcipiente20 = :composicaoexcipiente20
            WHERE 
            id = :id
            ");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':descricao', $data['descricao']);
        $prepare->bindValue(':id_categoria', $data['id_categoria']);
        $prepare->bindValue(':id_subcategoria', $data['id_subcategoria']);
        $prepare->bindValue(':formulacao', $data['formulacao']);
        $prepare->bindValue(':fabricar', $data['fabricar']);
        $prepare->bindValue(':ativo', $data['ativo']);
        $prepare->bindValue(':excipiente1', !empty($data['excipiente1']) ? $data['excipiente1'] : null);
        $prepare->bindValue(':composicaoexcipiente1', $data['composicaoexcipiente1']);
        $prepare->bindValue(':excipiente2',!empty($data['excipiente2']) ? $data['excipiente2'] : null);
        $prepare->bindValue(':composicaoexcipiente2', $data['composicaoexcipiente2']);
        $prepare->bindValue(':excipiente3',!empty($data['excipiente3']) ? $data['excipiente3'] : null);
        $prepare->bindValue(':composicaoexcipiente3', $data['composicaoexcipiente3']);
        $prepare->bindValue(':excipiente4',!empty($data['excipiente4']) ? $data['excipiente4'] : null);
        $prepare->bindValue(':composicaoexcipiente4', $data['composicaoexcipiente4']);
        $prepare->bindValue(':excipiente5', !empty($data['excipiente5']) ? $data['excipiente5'] : null);
        $prepare->bindValue(':composicaoexcipiente5', $data['composicaoexcipiente5']);
        $prepare->bindValue(':excipiente6', !empty($data['excipiente6']) ? $data['excipiente6'] : null);
        $prepare->bindValue(':composicaoexcipiente6', $data['composicaoexcipiente6']);
        $prepare->bindValue(':excipiente7', !empty($data['excipiente7']) ? $data['excipiente7'] : null);
        $prepare->bindValue(':composicaoexcipiente7', $data['composicaoexcipiente7']);
        $prepare->bindValue(':excipiente8',!empty($data['excipiente8']) ? $data['excipiente8'] : null);
        $prepare->bindValue(':composicaoexcipiente8', $data['composicaoexcipiente8']);
        $prepare->bindValue(':excipiente9', !empty($data['excipiente9']) ? $data['excipiente9'] : null);
        $prepare->bindValue(':composicaoexcipiente9', $data['composicaoexcipiente9']);
        $prepare->bindValue(':excipiente10', !empty($data['excipiente10']) ? $data['excipiente10'] : null);
        $prepare->bindValue(':composicaoexcipiente10', $data['composicaoexcipiente10']);
        $prepare->bindValue(':excipiente11', !empty($data['excipiente11']) ? $data['excipiente11'] : null);
        $prepare->bindValue(':composicaoexcipiente11', $data['composicaoexcipiente11']);
        $prepare->bindValue(':excipiente12', !empty($data['excipiente12']) ? $data['excipiente12'] : null);
        $prepare->bindValue(':composicaoexcipiente12', $data['composicaoexcipiente12']);
        $prepare->bindValue(':excipiente13', !empty($data['excipiente13']) ? $data['excipiente13'] : null);
        $prepare->bindValue(':composicaoexcipiente13', $data['composicaoexcipiente13']);
        $prepare->bindValue(':excipiente14', !empty($data['excipiente14']) ? $data['excipiente14'] : null);
        $prepare->bindValue(':composicaoexcipiente14', $data['composicaoexcipiente14']);
        $prepare->bindValue(':excipiente15', !empty($data['excipiente15']) ? $data['excipiente15'] : null);
        $prepare->bindValue(':composicaoexcipiente15', $data['composicaoexcipiente15']);
        $prepare->bindValue(':excipiente16', !empty($data['excipiente16']) ? $data['excipiente16'] : null);
        $prepare->bindValue(':composicaoexcipiente16', $data['composicaoexcipiente16']);
        $prepare->bindValue(':excipiente17', !empty($data['excipiente17']) ? $data['excipiente17'] : null);
        $prepare->bindValue(':composicaoexcipiente17', $data['composicaoexcipiente17']);
        $prepare->bindValue(':excipiente18', !empty($data['excipiente18']) ? $data['excipiente18'] : null);
        $prepare->bindValue(':composicaoexcipiente18', $data['composicaoexcipiente18']);
        $prepare->bindValue(':excipiente19', !empty($data['excipiente19']) ? $data['excipiente19'] : null);
        $prepare->bindValue(':composicaoexcipiente19', $data['composicaoexcipiente19']);
        $prepare->bindValue(':excipiente20', !empty($data['excipiente20']) ? $data['excipiente20'] : null);
        $prepare->bindValue(':composicaoexcipiente20', $data['composicaoexcipiente20']);
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