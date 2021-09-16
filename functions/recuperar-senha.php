<?php

session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

// Importar as classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
$mail = new PHPMailer(true);

require_once("../includes/configuracoes.inc.php");

require_once("../class/Functions.class.php");
require_once("../includes/database.inc.php");
require_once("../class/SimpleMail.class.php");
require_once("../class/Consultas.class.php");

$c = new Consultas($db);
$f = new Functions(BASE_SITE);

$email = $_POST['email'];

$usuario = $db->query("SELECT * FROM i9_medicos WHERE email = '$email'");
$usuario = $usuario->fetchAll(PDO::FETCH_ASSOC);

if(!empty($usuario)){
    $id = $usuario[0]['id'];
    $nome = $usuario[0]['nome'];

    $nova_senha = sprintf('%07X', mt_rand(0, 0xFFFFFFF));

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Username = 'nandomarzola1@gmail.com';
        $mail->Password = 'idenandopl1234';
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->setFrom('nandomarzola1@gmail.com', 'Nando Marzola');
        $mail->addAddress($email, $nome);
        $mail->isHTML(true);
        $mail->Subject = 'Nova senha Individualize';
        $mail->Body = "Sua nova senha foi cadastrada com sucesso:  <b>$nova_senha</b>";
        $mail->AltBody = "Sua nova senha foi cadastrada com sucesso:  <b>$nova_senha</b>";
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";exit;
    }

    $update = $db->query("UPDATE i9_medicos SET senha = '$nova_senha' WHERE id = $id");

    if ($update) {
        echo '<script type="text/javascript">alert("Foi enviado uma nova senha para o email digitado"); location.href="' . BASE_SITE . 'login"</script>';
    } else {
        echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="' . BASE_SITE . 'login"</script>';
    }
}else{
    echo '<script type="text/javascript">alert("Usuário não encontrado."); location.href="' . BASE_SITE . 'login"</script>';
}




