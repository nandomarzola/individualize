<?php
namespace App\Controllers\Admin;

use App\Models\Admin\Banner;
use App\Models\Admin\Store;
use CoffeeCode\Uploader\Image;
use League\Plates\Engine;

class BannerController extends AuthController
{
    private $view;
    private $view_error;

    public function __construct()
    {
        $this->existAdmin();
        $this->view = Engine::create(__DIR__ . '/../../../storage/views/admin/banner', "php");
        $this->view_error = Engine::create(__DIR__ . '/../../storage/views/error', "php");
    }

    public function index(): void
    {

        $model = new Store();
        $store = $model->dataStore(FABRICA);

        $model = new Banner();
        $banner = $model->find($store->loja_b2b);

        $data = [];

        if(!empty($banner)){
            foreach ($banner as $d){

                $values = json_decode(html_entity_decode($d['link']),true);

                $data[] = (object) [
                    'id' => $d['loja_b2b_banner'],
                    'loja_b2b' => $store->loja_b2b,
                    'title' => $values['title'],
                    'subtitle' => $values['sub_title'],
                    'url' => $values['url'],
                    'description' => $d['descricao']
                ];

            }
        }

        echo $this->view->render('index', [
            'title' => 'Banners | '. SITE,
            'data' => $data
        ]);
    }

    public function create()
    {
        echo $this->view->render('create', [
            'title' => 'Novo Banner | '. SITE,
        ]);
    }

    public function save(array $data = null)
    {
        $model = new Store();
        $store = $model->dataStore(FABRICA);

        if(isset($_POST)){

            $upload = new Image("storage/assets/images/factory", FABRICA);

            if(!empty($_FILES['input-file-preview'])){
                $file = $_FILES['input-file-preview'];

                if(in_array($file['type'], $upload::isAllowed())){
                    $uploaded = $upload->upload($file, pathinfo($file['name'], PATHINFO_FILENAME), 1950);
                }

            }

            if(!empty($data['id'])){
                $model_banner = new Banner();
                $banner = $model_banner->findById($data['id']);
                $link = json_decode($banner->link);
                $uploaded = $uploaded ?? $link->url;
            }

            $json = [
                "title" => $_POST['title'],
                "sub_title" => $_POST['sub_title'],
                "url" => $uploaded,
            ];

            $model = new Banner();

            if(!empty($data['id'])){
                $new_banner = $model->update([
                    'loja_b2b' => $store->loja_b2b,
                    'descricao' => $_POST['description'],
                    'link' => json_encode($json),
                    'id' => $data['id']
                ]);
            }else{
                $new_banner = $model->save([
                    'loja_b2b' => $store->loja_b2b,
                    'descricao' => $_POST['description'],
                    'link' => json_encode($json)
                ]);
            }


            if(!empty($new_banner)){
                flashMessages("success", "banner cadastrado/editado com sucesso");
                redirect(url('admin/banners'));
            }else{
                flashMessages("error", 'Ocorreu um problema ao cadastrar/editar o banner, favor contactar o suporte');
                redirect(url('admin/banners'));
            }

        }

    }

    public function edit(array $data){

        $model = new Banner();
        $banner = $model->findById($data['id']);
        $link = json_decode($banner->link);
        $img = explode('/', $link->url);

        echo $this->view->render('edit', [
            'title' => 'Editar Banner | '. SITE,
            'banner' => $banner,
            'link' => $link,
            'img' => end($img)
        ]);
    }

    public function destroy(array $data){

        $model = new Banner();
        $delete = $model->destroy($data['id'], $data['loja_b2b']);

        if($delete){
            flashMessages("success", "banner deletado com sucesso");
            redirect(url('admin/banners'));
        }else{
            flashMessages("error", "Error ao deletar banner, favor contactar o suporte");
            redirect(url('admin/banners'));
        }

    }

    public function error(array $error): void
    {
        echo $this->view_error->render('404', [
            'title' => 'Error | '. SITE,
        ]);
    }




}