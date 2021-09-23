<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Categories;
use App\Models\Doctors;
use App\Models\Glossary;
use League\Csv\Writer;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class DoctorsController extends ValidadeLogin
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Doctors();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/doctors', "php");
    }

    public function index()
    {
        $search = '';

        if(isset($_GET['search']) & !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "nome LIKE '%$descricao%'";
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
            'title' => 'Médicos | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        echo $this->view->render('create', [
            'title' => 'Cadastrar Médico | '. SITE,
        ]);
    }

    public function save(array $request)
    {
        $new_doctor = '';

        if(!empty($request['description']) && isset($request['name'])){
            $new_doctor = $this->model->save($request);
        }

        if(!empty($new_doctor)){
            flashMessages("success", "glossário cadastrado com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o glossário, favor contactar o suporte');
            redirect(url('doctors'));
        }

    }

    public function edit(array $data){

        $doctor = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Médico | '. SITE,
            'glossary' => $doctor
        ]);
    }

    public function delete(array $data){

        $delete_doctor = '';

        if(!empty($data['id'])){
            $delete_doctor = $this->model->destroy($data['id']);
        }

        if(!empty($delete_doctor)){
            flashMessages("success", "glossário  deletado com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar o glossário , favor contactar o suporte');
            redirect(url('doctors'));
        }
    }

    public function update(array $request)
    {
        $update_doctor = '';

        if(!empty($request['description']) || isset($request['name']) && isset($request['id'])){
            $update_doctor = $this->model->update($request);
        }

        if(!empty($update_doctor)){
            flashMessages("success", "glossário  editada com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o glossário , favor contactar o suporte');
            redirect(url('doctors'));
        }

    }

    public function generateCSV(){

        $doctors = $this->model->findAll();

        if(!empty($doctors)){
            $csv = Writer::createFromString("");
            $csv->insertOne([
                'Nome',
                'Empresa',
                'Email',
                'Segmento'
            ]);

            foreach($doctors as $item){
                $csv->insertOne([
                    $item['nome'],
                    $item['empresa'],
                    $item['email'],
                    $item['segmento'],
                ]);
            }

            $csv->output('medicos.xls');
        }
    }

}