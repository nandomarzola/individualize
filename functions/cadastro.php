<?php 
	
	session_start();

    require_once("../includes/configuracoes.inc.php");

    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/SimpleMail.class.php");
    require_once("../class/Consultas.class.php");

    $c = new Consultas($db);
    $f = new Functions(BASE_SITE);

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $identificacao = $_POST['identificacao'];
    $uf = $_POST['UF'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $segmento = $_POST['segmento'];

    // File upload path
	$targetDir = "../assets/img/uploads/";
	$fileName = basename($_FILES["logo"]["name"]);

	$targetFilePath = $targetDir . $fileName;
    $usuario_cadastro = true;
	//Valida Email

    if(empty($nome) || empty($empresa) || empty($identificacao) || empty($telefone) || empty($endereco) || empty($email) || empty($senha) || empty($tipo)){
        echo '<script type="text/javascript">alert("Por favor preencha todos os campos"); location.href="'.BASE_SITE.'cadastro"</script>';
    }

    if(!empty($tipo) && ($tipo == 1 || $tipo == 2)){
        if(empty($segmento)){
            echo '<script type="text/javascript">alert("Por favor selecione a área de atuação"); location.href="'.BASE_SITE.'cadastro"</script>';
        }
    }

    if(!empty($email)){
        $usuario = $db->query("SELECT * FROM i9_medicos WHERE email = '$email'");
        $usuario = $usuario->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($usuario)){
            echo '<script type="text/javascript">alert("E-mail já cadastrado no sistema"); location.href="'.BASE_SITE.'cadastro"</script>';
        }else{
            $usuario_cadastro = false;
        }
    }

    if(!empty($tipo)){
        if($tipo == 1){
            $tipo_identificao = 'CRM';
        }elseif ($tipo == 3){
            switch ($segmento) {
                case 'Esteticista':
                case 'Biomedico':
                    $tipo_identificao = 'CRBM';
                    break;
                case 'Cosmetologo':
                case 'Farmaceutico':
                    $tipo_identificao = 'CRF';
                    break;
                case 'Nutricionista':
                    $tipo_identificao = 'CRN';
                    break;
                case 'Fisioterapeuta':
                    $tipo_identificao = 'CREFITO';
                    break;
            }
        }else{
            $tipo_identificao = '';
        }
    }

	//validação de medicos
    if(!empty($identificacao) && !empty($uf)){
        $url = "https://www.consultacrm.com.br/api/index.php?tipo=$tipo_identificao&uf=$uf&q=$identificacao&chave=1131329113&destino=json";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        $return = curl_exec($curl);
        curl_close($curl);

        $arrResp = json_decode($return, true);

        var_dump($arrResp);exit;

        if(empty($arrResp['item'])){
            echo '<script type="text/javascript">alert("CRM/CRF inválido."); location.href="'.BASE_SITE.'cadastro"</script>';
        }
    }

    if(!$usuario_cadastro && !empty($arrResp['item'])){
        if(!empty($_FILES["logo"]["name"])){

            $teste = move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath);


            if( $teste ) {

                if($nome == '' || $empresa == '' || $telefone == '' || $endereco == '' || $email == '' || $senha == '' || $tipo == '') {
                    echo '<script type="text/javascript">alert("Os campos não foram preenchidos corretamente."); location.href="'.BASE_SITE.'cadastro"</script>';
                } else {

                    $insert = $db->query("INSERT into i9_medicos (nome,empresa,identificacao,telefone,endereco,email,senha,logo,status,tipo,segmento, tipo_identificacao)
                                            VALUES ('".$nome."','".$empresa."','".$identificacao."','".$telefone."','".$endereco."','".$email."','".$senha."','".$fileName."','1','".$tipo."','".$segmento."','".$tipo_identificao."')");

                    if($insert) {
                        echo '<script type="text/javascript">alert("Você foi cadastrado no sistema."); location.href="'.BASE_SITE.'"</script>';
                    } else {
                        echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="'.BASE_SITE.'cadastro"</script>';
                    }
                }
            }
        } else {
            if($nome == '' || $empresa == '' || $telefone == '' || $endereco == '' || $email == '' || $senha == '' || $tipo == '') {
                echo '<script type="text/javascript">alert("Os campos não foram preenchidos corretamente."); location.href="'.BASE_SITE.'cadastro"</script>';
            } else {

                $insert = $db->query("INSERT into i9_medicos (nome,empresa,identificacao,telefone,endereco,email,senha,logo,status,tipo,segmento, tipo_identificacao)
                                            VALUES ('".$nome."','".$empresa."','".$identificacao."','".$telefone."','".$endereco."','".$email."','".$senha."','".$fileName."','1','".$tipo."','".$segmento."','".$tipo_identificao."')");

                if($insert) {
                    echo '<script type="text/javascript">alert("Você foi cadastrado no sistema."); location.href="'.BASE_SITE.'"</script>';
                } else {
                    echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="'.BASE_SITE.'cadastro"</script>';
                }
            }
        }
    }


?>