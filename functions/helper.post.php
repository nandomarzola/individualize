<?php
    # Inicia Sessão
    session_start();

    # OB
    ob_start();

    ## Configuracoes ##
    require_once("../includes/configuracoes.inc.php");
    
    ## Classes ##
    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/SimpleMail.class.php");
    require_once("../class/Consultas.class.php");

    ## Objetos ##
    $functions = new Functions(BASE_SITE);
    $mail = new SimpleMail();
    $c = new Consultas($db);

    $urlCompleta = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>