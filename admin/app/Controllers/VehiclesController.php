<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Categories;
use App\Models\Formula;
use App\Models\Glossary;
use App\Models\SubCategories;
use App\Models\Vehicles;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class VehiclesController extends ValidateLoginController
{
    private $view;
    private $model;
    private $model_categories;
    private $model_sub_categories;
    private $model_formula;
    private $model_glossary;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Vehicles();
        $this->model_categories = new Categories();
        $this->model_sub_categories = new SubCategories();
        $this->model_formula = new Formula();
        $this->model_glossary = new Glossary();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/vehicles', "php");
    }

    public function index()
    {
        /*for ($i=1;$i<21;$i++){
            //echo "ALTER TABLE `i9_veiculos` CHANGE `composicaoexcipiente$i` `composicaoexcipiente$i` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;".'<br/>';
            //echo "excipiente$i = :excipiente$i".','.'<br/>';
            //echo "composicaoexcipiente$i = :composicaoexcipiente$i".','.'<br/>';
            //echo "prepare->bindValue(':excipiente$i', data['excipiente$i'])".'<br/>';
            //echo "prepare->bindValue(':composicaoexcipiente$i', data['composicaoexcipiente$i'])".'<br/>';
        }

        exit;*/

        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "and veiculos.nome LIKE '%$descricao%'";
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
            'title' => 'Veículos | '. SITE,
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

        echo $this->view->render('create', [
            'title' => 'Cadastrar Veículos | '. SITE,
            'categories' => $categories,
            'glossary' => $glossary,
            'sub_categories' => $sub_categories
        ]);
    }

    public function save(array $request)
    {
        $new_vehicle = '';

        if(!empty($request['name'])
            && !empty($request['descricao'])
            && !empty($request['id_categoria'])
            && !empty($request['id_subcategoria'])
            && !empty($request['formulacao'])
            && !empty($request['fabricar'])
            && !empty($request['ativo'])
        ){
            $new_vehicle = $this->model->save($request);
        }

        if(!empty($new_vehicle)){
            flashMessages("success", "Veículo cadastrado com sucesso");
            redirect(url('vehicles'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o Veículo, favor contactar o suporte');
            redirect(url('vehicles'));
        }

    }

    public function edit(array $data)
    {
        $glossary = $this->model_glossary->findAll();
        $categories = $this->model_categories->findAll();
        $sub_categories = $this->model_sub_categories->findAll();
        $vehicles = (array) $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Veículos | '. SITE,
            'categories' => $categories,
            'glossary' => $glossary,
            'sub_categories' => $sub_categories,
            'vehicles' => $vehicles
        ]);
    }

    public function delete(array $data)
    {

        $delete_vehicle = '';

        if(!empty($data['id'])){
            $delete_vehicle = $this->model->destroy($data['id']);
        }

        if(!empty($delete_vehicle)){
            flashMessages("success", "Veículo deletado com sucesso");
            redirect(url('vehicles'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar o Veículo , favor contactar o suporte');
            redirect(url('vehicles'));
        }
    }

    public function update(array $request)
    {
        $update_vehicle = '';

        if(!empty($request['name'])
            && !empty($request['descricao'])
            && !empty($request['id_categoria'])
            && !empty($request['id_subcategoria'])
            && !empty($request['formulacao'])
            && !empty($request['fabricar'])
            && !empty($request['ativo'])
            && !empty($request['id'])
        ){
            $update_vehicle = $this->model->update($request);
        }

        if(!empty($update_vehicle)){
            flashMessages("success", "Veículo editado com sucesso");
            redirect(url('vehicles'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o Veículo , favor contactar o suporte');
            redirect(url('vehicles'));
        }

    }

}