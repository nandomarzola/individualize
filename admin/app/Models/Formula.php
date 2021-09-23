<?php

namespace App\Models;

class Formula extends Model
{
    private $db = 'i9_formulas';
    private $db_categories = 'i9_categorias';
    private $db_sub_categories = 'i9_subcategorias';

    public function findById(int $id) {

        $query = "select * from $this->db where id = '$id'";

        return (object) $this->query($query)->fetch();

    }

    public function find($limit, $offset, $search) {


        $query = "select formula.*, cat.nome as nome_categoria, cat_sub.nome as nome_categoria_sub from 
                    $this->db as formula
                    left join $this->db_categories as cat ON cat.id = formula.id_categoria
                    left join $this->db_sub_categories as cat_sub ON cat_sub.id = formula.id_subcategoria
                    where formula.ativo is true 
                    $search LIMIT $limit OFFSET $offset
                    ";

        return (object) $this->query($query)->fetchAll();

    }

    public function findAll() {

        $query = "select * from $this->db where ativo is true";

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
                    veiculo,
                    veiculo2,
                    ativo1,
                    composicaoativo1,
                    ativo2,
                    composicaoativo2,
                    ativo3,
                    composicaoativo3,
                    ativo4,
                    composicaoativo4,
                    ativo5,
                    composicaoativo5,
                    ativo6,
                    composicaoativo6,
                    ativo7,
                    composicaoativo7,
                    ativo8,
                    composicaoativo8,
                    ativo9,
                    composicaoativo9,
                    ativo10,
                    composicaoativo10,
                    ativo11,
                    composicaoativo11,
                    ativo12,
                    composicaoativo12,
                    ativo13,
                    composicaoativo13,
                    ativo14,
                    composicaoativo14,
                    ativo15,
                    composicaoativo15,
                    ativo16,
                    composicaoativo16,
                    ativo17,
                    composicaoativo17,
                    ativo18,
                    composicaoativo18,
                    ativo19,
                    composicaoativo19,
                    ativo20,
                    composicaoativo20
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
                    :veiculo,
                    :veiculo2,
                    :ativo1,
                    :composicaoativo1,
                    :ativo2,
                    :composicaoativo2,
                    :ativo3,
                    :composicaoativo3,
                    :ativo4,
                    :composicaoativo4,
                    :ativo5,
                    :composicaoativo5,
                    :ativo6,
                    :composicaoativo6,
                    :ativo7,
                    :composicaoativo7,
                    :ativo8,
                    :composicaoativo8,
                    :ativo9,
                    :composicaoativo9,
                    :ativo10,
                    :composicaoativo10,
                    :ativo11,
                    :composicaoativo11,
                    :ativo12,
                    :composicaoativo12,
                    :ativo13,
                    :composicaoativo13,
                    :ativo14,
                    :composicaoativo14,
                    :ativo15,
                    :composicaoativo15,
                    :ativo16,
                    :composicaoativo16,
                    :ativo17,
                    :composicaoativo17,
                    :ativo18,
                    :composicaoativo18,
                    :ativo19,
                    :composicaoativo19,
                    :ativo20,
                    :composicaoativo20
                    )
                    ");

        $prepare->bindValue(':nome',$data['name']);
        $prepare->bindValue(':descricao', $data['descricao']);
        $prepare->bindValue(':id_categoria', $data['id_categoria']);
        $prepare->bindValue(':id_subcategoria', $data['id_subcategoria']);
        $prepare->bindValue(':formulacao', $data['formulacao']);
        $prepare->bindValue(':fabricar', $data['fabricar']);
        $prepare->bindValue(':ativo', $data['ativo']);
        $prepare->bindValue(':veiculo', $data['veiculo']);
        $prepare->bindValue(':veiculo2', $data['veiculo2']);
        $prepare->bindValue(':ativo1', !empty($data['ativo1']) ? $data['ativo1'] : null);
        $prepare->bindValue(':composicaoativo1', $data['composicaoativo1']);
        $prepare->bindValue(':ativo2', !empty($data['ativo2']) ? $data['ativo2'] : null);
        $prepare->bindValue(':composicaoativo2', $data['composicaoativo2']);
        $prepare->bindValue(':ativo3', !empty($data['ativo3']) ? $data['ativo3'] : null);
        $prepare->bindValue(':composicaoativo3', $data['composicaoativo3']);
        $prepare->bindValue(':ativo4', !empty($data['ativo4']) ? $data['ativo4'] : null);
        $prepare->bindValue(':composicaoativo4', $data['composicaoativo4']);
        $prepare->bindValue(':ativo5', !empty($data['ativo5']) ? $data['ativo5'] : null);
        $prepare->bindValue(':composicaoativo5', $data['composicaoativo5']);
        $prepare->bindValue(':ativo6', !empty($data['ativo6']) ? $data['ativo6'] : null);
        $prepare->bindValue(':composicaoativo6', $data['composicaoativo6']);
        $prepare->bindValue(':ativo7', !empty($data['ativo7']) ? $data['ativo7'] : null);
        $prepare->bindValue(':composicaoativo7', $data['composicaoativo7']);
        $prepare->bindValue(':ativo8', !empty($data['ativo8']) ? $data['ativo8'] : null);
        $prepare->bindValue(':composicaoativo8', $data['composicaoativo8']);
        $prepare->bindValue(':ativo9', !empty($data['ativo9']) ? $data['ativo9'] : null);
        $prepare->bindValue(':composicaoativo9', $data['composicaoativo9']);
        $prepare->bindValue(':ativo10', !empty($data['ativo10']) ? $data['ativo10'] : null);
        $prepare->bindValue(':composicaoativo10', $data['composicaoativo10']);
        $prepare->bindValue(':ativo11', !empty($data['ativo11']) ? $data['ativo11'] : null);
        $prepare->bindValue(':composicaoativo11', $data['composicaoativo11']);
        $prepare->bindValue(':ativo12', !empty($data['ativo12']) ? $data['ativo12'] : null);
        $prepare->bindValue(':composicaoativo12', $data['composicaoativo12']);
        $prepare->bindValue(':ativo13', !empty($data['ativo13']) ? $data['ativo13'] : null);
        $prepare->bindValue(':composicaoativo13', $data['composicaoativo13']);
        $prepare->bindValue(':ativo14', !empty($data['ativo14']) ? $data['ativo14'] : null);
        $prepare->bindValue(':composicaoativo14', $data['composicaoativo14']);
        $prepare->bindValue(':ativo15', !empty($data['ativo15']) ? $data['ativo15'] : null);
        $prepare->bindValue(':composicaoativo15', $data['composicaoativo15']);
        $prepare->bindValue(':ativo16', !empty($data['ativo16']) ? $data['ativo16'] : null);
        $prepare->bindValue(':composicaoativo16', $data['composicaoativo16']);
        $prepare->bindValue(':ativo17', !empty($data['ativo17']) ? $data['ativo17'] : null);
        $prepare->bindValue(':composicaoativo17', $data['composicaoativo17']);
        $prepare->bindValue(':ativo18', !empty($data['ativo18']) ? $data['ativo18'] : null);
        $prepare->bindValue(':composicaoativo18', $data['composicaoativo18']);
        $prepare->bindValue(':ativo19', !empty($data['ativo19']) ? $data['ativo19'] : null);
        $prepare->bindValue(':composicaoativo19', $data['composicaoativo19']);
        $prepare->bindValue(':ativo20', !empty($data['ativo20']) ? $data['ativo20'] : null);
        $prepare->bindValue(':composicaoativo20', $data['composicaoativo20']);

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
            veiculo = :veiculo,
            veiculo2 = :veiculo2,
            ativo1 = :ativo1,
            composicaoativo1 = :composicaoativo1,
            ativo2 = :ativo2,
            composicaoativo2 = :composicaoativo2,
            ativo3 = :ativo3,
            composicaoativo3 = :composicaoativo3,
            ativo4 = :ativo4,
            composicaoativo4 = :composicaoativo4,
            ativo5 = :ativo5,
            composicaoativo5 = :composicaoativo5,
            ativo6 = :ativo6,
            composicaoativo6 = :composicaoativo6,
            ativo7 = :ativo7,
            composicaoativo7 = :composicaoativo7,
            ativo8 = :ativo8,
            composicaoativo8 = :composicaoativo8,
            ativo9 = :ativo9,
            composicaoativo9 = :composicaoativo9,
            ativo10 = :ativo10,
            composicaoativo10 = :composicaoativo10,
            ativo11 = :ativo11,
            composicaoativo11 = :composicaoativo11,
            ativo12 = :ativo12,
            composicaoativo12 = :composicaoativo12,
            ativo13 = :ativo13,
            composicaoativo13 = :composicaoativo13,
            ativo14 = :ativo14,
            composicaoativo14 = :composicaoativo14,
            ativo15 = :ativo15,
            composicaoativo15 = :composicaoativo15,
            ativo16 = :ativo16,
            composicaoativo16 = :composicaoativo16,
            ativo17 = :ativo17,
            composicaoativo17 = :composicaoativo17,
            ativo18 = :ativo18,
            composicaoativo18 = :composicaoativo18,
            ativo19 = :ativo19,
            composicaoativo19 = :composicaoativo19,
            ativo20 = :ativo20,
            composicaoativo20 = :composicaoativo20
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
        $prepare->bindValue(':veiculo', $data['veiculo']);
        $prepare->bindValue(':veiculo2', $data['veiculo2']);
        $prepare->bindValue(':ativo1', !empty($data['ativo1']) ? $data['ativo1'] : null);
        $prepare->bindValue(':composicaoativo1', $data['composicaoativo1']);
        $prepare->bindValue(':ativo2', !empty($data['ativo2']) ? $data['ativo2'] : null);
        $prepare->bindValue(':composicaoativo2', $data['composicaoativo2']);
        $prepare->bindValue(':ativo3', !empty($data['ativo3']) ? $data['ativo3'] : null);
        $prepare->bindValue(':composicaoativo3', $data['composicaoativo3']);
        $prepare->bindValue(':ativo4', !empty($data['ativo4']) ? $data['ativo4'] : null);
        $prepare->bindValue(':composicaoativo4', $data['composicaoativo4']);
        $prepare->bindValue(':ativo5', !empty($data['ativo5']) ? $data['ativo5'] : null);
        $prepare->bindValue(':composicaoativo5', $data['composicaoativo5']);
        $prepare->bindValue(':ativo6', !empty($data['ativo6']) ? $data['ativo6'] : null);
        $prepare->bindValue(':composicaoativo6', $data['composicaoativo6']);
        $prepare->bindValue(':ativo7', !empty($data['ativo7']) ? $data['ativo7'] : null);
        $prepare->bindValue(':composicaoativo7', $data['composicaoativo7']);
        $prepare->bindValue(':ativo8', !empty($data['ativo8']) ? $data['ativo8'] : null);
        $prepare->bindValue(':composicaoativo8', $data['composicaoativo8']);
        $prepare->bindValue(':ativo9', !empty($data['ativo9']) ? $data['ativo9'] : null);
        $prepare->bindValue(':composicaoativo9', $data['composicaoativo9']);
        $prepare->bindValue(':ativo10', !empty($data['ativo10']) ? $data['ativo10'] : null);
        $prepare->bindValue(':composicaoativo10', $data['composicaoativo10']);
        $prepare->bindValue(':ativo11', !empty($data['ativo11']) ? $data['ativo11'] : null);
        $prepare->bindValue(':composicaoativo11', $data['composicaoativo11']);
        $prepare->bindValue(':ativo12', !empty($data['ativo12']) ? $data['ativo12'] : null);
        $prepare->bindValue(':composicaoativo12', $data['composicaoativo12']);
        $prepare->bindValue(':ativo13', !empty($data['ativo13']) ? $data['ativo13'] : null);
        $prepare->bindValue(':composicaoativo13', $data['composicaoativo13']);
        $prepare->bindValue(':ativo14', !empty($data['ativo14']) ? $data['ativo14'] : null);
        $prepare->bindValue(':composicaoativo14', $data['composicaoativo14']);
        $prepare->bindValue(':ativo15', !empty($data['ativo15']) ? $data['ativo15'] : null);
        $prepare->bindValue(':composicaoativo15', $data['composicaoativo15']);
        $prepare->bindValue(':ativo16', !empty($data['ativo16']) ? $data['ativo16'] : null);
        $prepare->bindValue(':composicaoativo16', $data['composicaoativo16']);
        $prepare->bindValue(':ativo17', !empty($data['ativo17']) ? $data['ativo17'] : null);
        $prepare->bindValue(':composicaoativo17', $data['composicaoativo17']);
        $prepare->bindValue(':ativo18', !empty($data['ativo18']) ? $data['ativo18'] : null);
        $prepare->bindValue(':composicaoativo18', $data['composicaoativo18']);
        $prepare->bindValue(':ativo19', !empty($data['ativo19']) ? $data['ativo19'] : null);
        $prepare->bindValue(':composicaoativo19', $data['composicaoativo19']);
        $prepare->bindValue(':ativo20', !empty($data['ativo20']) ? $data['ativo20'] : null);
        $prepare->bindValue(':composicaoativo20', $data['composicaoativo20']);
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