<?php


session_start();

require_once("../includes/configuracoes.inc.php");

require_once("../class/Functions.class.php");
require_once("../includes/database.inc.php");
require_once("../class/SimpleMail.class.php");
require_once("../class/Consultas.class.php");

$c = new Consultas($db);
$f = new Functions(BASE_SITE);

$id = $_POST['usuario'];
$nome = $_POST['nome'];
$empresa = $_POST['empresa'];
$crm = $_POST['crm'];
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

dd($targetFilePath);

if (!empty($_FILES["logo"]["name"])) {

    $teste = move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath);

    if ($teste) {

        $update = $db->query("UPDATE i9_medicos SET endereco = '$endereco', telefone = '$telefone', senha = '$senha', tipo = $tipo, empresa = '$empresa', segmento = '$segmento' WHERE id = $id");

        if ($update) {
            echo '<script type="text/javascript">alert("Cadastro atualizado com sucesso"); location.href="' . BASE_SITE . 'perfil"</script>';
        } else {
            echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="' . BASE_SITE . 'perfil"</script>';
        }
    }

} else {

    $update = $db->query("UPDATE i9_medicos SET endereco = '$endereco', telefone = '$telefone', senha = '$senha', tipo = $tipo, empresa = '$empresa', segmento = '$segmento' WHERE id = $id");

    if ($update) {
        echo '<script type="text/javascript">alert("Cadastro atualizado com sucesso"); location.href="' . BASE_SITE . 'perfil"</script>';
    } else {
        echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="' . BASE_SITE . 'perfil"</script>';
    }
}
