<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Doctors;
use App\Models\Formula;
use App\Models\ImpressionHistory;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class ImpressionHistoryController extends ValidadeLogin
{
    private $view;
    private $model;
    private $model_medicos;
    private $model_formulas;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new ImpressionHistory();
        $this->model_medicos = new Doctors();
        $this->model_formulas = new Formula();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/impression_history', "php");
    }

    public function index()
    {
        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "and medicos.nome LIKE '%$descricao%' OR formulas.nome LIKE '%$descricao%'";
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
            'title' => 'Histórico de Impressões | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function edit(array $data){

        $impression_history = $this->model->findById($data['id']);
        $medicos = $this->model_medicos->findAll();
        $formulas = $this->model_formulas->findAll();

        echo $this->view->render('edit', [
            'title' => 'Editar Histórico de Impressões | '. SITE,
            'impression_history' => $impression_history,
            'medicos' => $medicos,
            'formulas' => $formulas
        ]);
    }

    public function update(array $request)
    {
        $update_impression = '';

        if(!empty($request['id_medico']) && isset($request['id_formula']) && isset($request['id'])){
            $update_impression = $this->model->update($request);
        }

        if(!empty($update_impression)){
            flashMessages("success", "Histórico de Impressões  editado com sucesso");
            redirect(url('impression-history'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o Histórico de Impressões , favor contactar o suporte');
            redirect(url('impression-history'));
        }

    }

}