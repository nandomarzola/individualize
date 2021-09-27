<?php
namespace App\Controllers;


use App\Controllers\ValidateLoginController;
use App\Models\Partners;
use League\Plates\Engine;
use CoffeeCode\Paginator\Paginator;
use CoffeeCode\Uploader\Image;

class PartnersController extends ValidateLoginController
{
    private $view;
    private $model;
    private $paginator;

    public function __construct()
    {
        $this->existAdmin();
        $this->paginator = new Paginator();
        $this->model = new Partners();
        $this->view = Engine::create(__DIR__ . '/../../storage/views/partners', "php");
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
            'title' => 'Glossário | '. SITE,
            'data' => $data,
            'paginator' => $this->paginator,
            'total_register' => $total_register
        ]);
    }

    public function create()
    {
        echo $this->view->render('create', [
            'title' => 'Cadastrar Parceiro | '. SITE,
        ]);
    }

    public function save(array $request)
    {
        $new_partner = '';
        $files = $_FILES;
        $uploaded = '';

        $upload = new Image("assets/img", 'uploads');

        if(!empty($files['imagem'])){
            $file = $files['imagem'];

            if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
                flashMessages("success", "Selecione uma imagem válida");
                redirect(url('partners'));
            }else{
                $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 1920);
            }
        }

        if(empty($uploaded)){
            flashMessages("success", "Selecione uma imagem para continuar o cadastro");
            redirect(url('partners'));
        }else{
            $request['imagem'] = $uploaded;
        }

        if(!empty($request['imagem']) && !empty($request['nome']) && !empty($request['link']) && !empty($request['descricao'])){
            $new_partner = $this->model->save($request);
        }

        if(!empty($new_partner)){
            flashMessages("success", "Parceiro cadastrado com sucesso");
            redirect(url('partners'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao cadastrar o Parceiro, favor contactar o suporte');
            redirect(url('partners'));
        }

    }

    public function edit(array $data){

        $partner = $this->model->findById($data['id']);

        echo $this->view->render('edit', [
            'title' => 'Editar Parceiro | '. SITE,
            'partner' => $partner
        ]);
    }

    public function delete(array $data){

        $delete_partner = '';

        if(!empty($data['id'])){
            $delete_partner = $this->model->destroy($data['id']);
        }

        if(!empty($delete_partner)){
            flashMessages("success", "Parceiro  deletado com sucesso");
            redirect(url('partners'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao deletar o Parceiro , favor contactar o suporte');
            redirect(url('partners'));
        }
    }

    public function update(array $request)
    {
        $update_partner = '';
        $files = $_FILES;
        $uploaded = '';
        $upload = new Image("assets/img", 'uploads');

        if(!empty($files['imagem']['name'])){
            $file = $files['imagem'];

            if(empty($file['type']) || !in_array($file['type'], $upload::isAllowed())){
                flashMessages("success", "Selecione uma imagem válida");
                redirect(url('partners'));
            }else{
                $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 1920);
            }
        }

        if(!empty($uploaded)){
            $request['imagem'] = $uploaded;
        }else{
            $request['imagem'] = $request['img_antiga'];
        }

        if(!empty($request['nome']) && !empty($request['link']) && !empty($request['descricao'])){
            $update_partner = $this->model->update($request);
        }

        if(!empty($update_partner)){
            flashMessages("success", "Parceiro  editado com sucesso");
            redirect(url('partners'));
        }else{
            flashMessages("error", 'Ocorreu um problema ao editar o Parceiro , favor contactar o suporte');
            redirect(url('partners'));
        }

    }

}