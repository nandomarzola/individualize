<?php
namespace App\Controllers;


use App\Controllers\ValidadeLogin;
use App\Models\Categories;
use App\Models\Doctors;
use App\Models\Glossary;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;
use League\Csv\Writer;

class DoctorsSegmentController extends ValidadeLogin
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Doctors();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/doctors-segment', "php");
    }

    public function selectSegment()
    {
        echo $this->view->render('select-segment', [
            'title' => 'Médicos por Segmento | '. SITE,
        ]);
    }

    public function index()
    {
        $search = '';

        if(isset($_GET['search']) && !empty($_GET['search'])){
            $descricao = trim($_GET['search']);
            $search = "where segmento = '".$_GET['segment']."' and nome LIKE '%$descricao%'";
            $this->paginator = new Paginator("?segment=".$_GET['segment']."&search=".$_GET['search']."&page=");
        }

        $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_STRIPPED);
        $total_register = $this->model->countRegistersSelected($search, $_GET['segment']);

        $this->paginator->pager($total_register[0]['count'], 10, $page, "2");

        $data = $this->model->findDoctorSegment(
            $_GET['segment'],
            $this->paginator->limit(),
            $this->paginator->offset(),
            $search
        );

        echo $this->view->render('index', [
            'title' => 'Médicos por Segmento | '. SITE,
            'data' => (array) $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function generateCSV(array $request){

        $doctors = [];

        if($request['segment']){
            $doctors = $this->model->findSegmentCSV($request['segment']);
        }

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

            $csv->output('medicos.csv');
        }
    }

}