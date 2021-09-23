<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Categories;
use App\Models\Formula;
use App\Models\Glossary;
use App\Models\SubCategories;
use App\Models\Vehicles;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class FormulaController extends ValidadeLogin
{
    private $view;
    private $model;
    private $model_categories;
    private $model_sub_categories;
    private $model_vehicles;
    private $model_glossary;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Formula();
        $this->model_categories = new Categories();
        $this->model_sub_categories = new SubCategories();
        $this->model_vehicles = new Vehicles();
        $this->model_glossary = new Glossary();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/formula', "php");
    }

    public function index()
    {

        /*for ($i=1;$i<21;$i++){
            //echo "ALTER TABLE `i9_formulas` CHANGE `composicaoativo$i` `composicaoativo$i` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;".'<br/>';
            echo "ativo$i = :ativo$i".','.'<br/>';
            echo "composicaoativo$i = :composicaoativo$i".','.'<br/>';
            //echo "prepare->bindValue(':ativo$i', data['ativo$i'])".'<br/>';
            //echo "prepare->bindValue(':composicaoativo$i', data['composicaoativo$i'])".'<br/>';
        }

        exit;*/

        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "and nome LIKE '%$descricao%'";
            $this->paginator = new Paginator("?search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegisters($search);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->find(
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        echo $this->view->render('index', [
            'title' => 'Fórmula | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        $glossary = $this->model_glossary->findAll();
        $categories = $this->model_categories->findAll();
        $sub_categories = $this->model_sub_categories->findAll();
        $vehicles = $this->model_vehicles->findAll();

        echo $this->view->render('create', [
            'title' => 'Cadastrar Fórmula | '. SITE,
            'categories' => $categories,
            'glossary' => $glossary,
            'sub_categories' => $sub_categories,
            'vehicles' => $vehicles
        ]);
    }

    public function save(array $request)
    {
        $new_formula = '';

        if(!empty($request['name'])
            && !empty($request['descricao'])
            && !empty($request['id_categoria'])
            && !empty($request['id_subcategoria'])
            && !empty($request['formulacao'])
            && !empty($request['fabricar'])
            && !empty($request['ativo'])
            && !empty($request['veiculo'])
            && !empty($request['veiculo2'])
        ){
            $new_formula = $this->model->save($request);
        }

        if(!empty($new_formula)){
            flashMessages("success", "Fórmula cadastrado com sucesso");
            redirect(url('formula'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar a Fórmula, favor contactar o suporte');
            redirect(url('formula'));
        }

    }

    public function edit(array $data)
    {
        $glossary = $this->model_glossary->findAll();
        $categories = $this->model_categories->findAll();
        $sub_categories = $this->model_sub_categories->findAll();
        $vehicles = $this->model_vehicles->findAll();
        $formula = (array) $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Fórmula | '. SITE,
            'formula' => $formula,
            'categories' => $categories,
            'glossary' => $glossary,
            'sub_categories' => $sub_categories,
            'vehicles' => $vehicles
        ]);
    }

    public function delete(array $data)
    {

        $delete_formula = '';

        if(!empty($data['id'])){
            $delete_formula = $this->model->destroy($data['id']);
        }

        if(!empty($delete_formula)){
            flashMessages("success", "Fórmula deletado com sucesso");
            redirect(url('formula'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar a Fórmula , favor contactar o suporte');
            redirect(url('formula'));
        }
    }

    public function update(array $request)
    {
        $update_formula = '';

        if(!empty($request['name'])
            && !empty($request['descricao'])
            && !empty($request['id_categoria'])
            && !empty($request['id_subcategoria'])
            && !empty($request['formulacao'])
            && !empty($request['fabricar'])
            && !empty($request['ativo'])
            && !empty($request['veiculo'])
            && !empty($request['veiculo2'])
            && !empty($request['id'])
        ){
            $update_formula = $this->model->update($request);
        }

        if(!empty($update_formula)){
            flashMessages("success", "Fórmula editada com sucesso");
            redirect(url('formula'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar a Fórmula , favor contactar o suporte');
            redirect(url('formula'));
        }

    }

}