<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Categories;
use App\Models\Doctors;
use App\Models\Glossary;
use CoffeeCode\Uploader\Image;
use League\Csv\Writer;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;

class DoctorsController extends ValidateLoginController
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

        $files = $_FILES;
        $uploaded = '';
        $upload = new Image("../assets/img", 'uploads');

        if(!empty($files['imagem']['name'])){
            $file = $files['imagem'];

            if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
                flashMessages("success", "Selecione uma imagem valida");
                redirect(url('partners'));
            }else{
                $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 1920);
            }
        }

        if(!empty($uploaded)){
            $request['logo'] = $uploaded;
        }else{
            $request['logo'] = $request['img_antiga'];
        }

        if(!empty($request['senha'])){
            $request['senha'] = crypt($request['senha'], '');
        }

        //dd($request);

        if(!empty($request['tipo'])){
            $new_doctor = $this->model->save($request);
        }

        if(!empty($new_doctor)){
            flashMessages("success", "Medico cadastrado com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o medico, favor contactar o suporte');
            redirect(url('doctors'));
        }

    }

    public function edit(array $data){

        $doctor = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Médico | '. SITE,
            'doctor' => $doctor
        ]);
    }

    public function delete(array $data){

        $delete_doctor = '';

        if(!empty($data['id'])){
            $delete_doctor = $this->model->destroy($data['id']);
        }

        if(!empty($delete_doctor)){
            flashMessages("success", "medico  deletado com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar o medico , favor contactar o suporte');
            redirect(url('doctors'));
        }
    }

    public function update(array $request)
    {
        $update_doctor = '';
        $files = $_FILES;
        $uploaded = '';
        $valida_identificacao = '';
        $msg_error = "Ocorreu um problema ao editar o medico , favor contactar o suporte";
        $upload = new Image("../assets/img", 'uploads');

        if(!empty($files['imagem']['name'])){
            $file = $files['imagem'];

            if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
                flashMessages("success", "Selecione uma imagem valida");
                redirect(url('partners'));
            }else{
                $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 1920);
            }
        }

        if(!empty($uploaded)){
            $request['logo'] = $uploaded;
        }else{
            $request['logo'] = $request['img_antiga'];
        }

        if(isset($request['identificacao']) && !empty($request['identificacao'])){
            $valida_identificacao = apiConsultaMédicos($request['UF'], $request['identificacao'], $request['tipo_identificacao']);
        }

        if(!empty($request['tipo'])){
            if($request['tipo'] == 1 || $request['tipo'] == 3){
                if(!empty($valida_identificacao['item'])){
                    $update_doctor = $this->model->update($request);
                }else{
                    $msg_error = $request['tipo_identificacao']." não encontrada, tente novamente mais tarde!";
                }
            }else{
                $update_doctor = $this->model->update($request);
            }
        }

        if(!empty($update_doctor)){
            flashMessages("success", "medico  editado com sucesso");
            redirect(url('doctors'));
        }else{
            flashMessages("error", $msg_error);
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