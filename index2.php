<?php
    header('X-XSS-Protection: 0');

    ## OB ##
    ob_start(); 

    ## Configuracoes ##
    require_once("includes/configuracoes.inc.php");

    ## Classes ##
    require_once("class/Functions.class.php");
    require_once("includes/database.inc.php");
    require_once("class/Consultas.class.php");

    ## Objetos ##
    $functions = new Functions(BASE_SITE);
    $c = new Consultas($db);

    # Segurança
    $_GET = $functions->_antiSqlInjection($_GET);
    $_POST = $functions->_antiSqlInjection($_POST);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <base href="<?=BASE_SITE?>" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <title><?php echo $institucional['titulo_site']; ?></title>
    <meta name="author" content="<?=AUTOR_SITE?>">
    <link rel="shortcut icon" href="<?=BASE_SITE;?>assets/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=BASE_SITE;?>assets/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Owl Carousel -->
    <link href="<?=BASE_SITE;?>assets/js/owl-carousel/css/owl.carousel.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/main.css">

    <script src="//code.jivosite.com/widget/YVoQmN8LNo" async></script>

</head>
<body class="_tr">
    <div class="wrapper">
Teste
        <div class="push"></div>
    </div>

    <!-- >> JS
    ============================================================================== -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Masks/Validation -->
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
    <script src="//ajax.microsoft.com/ajax/jquery.validate/1.11.1/additional-methods.js"></script>
    <script src="<?=BASE_SITE;?>assets/js/validation/masks.js"></script>
    <!-- Owl Carousel -->
    <script src="<?=BASE_SITE;?>assets/js/owl-carousel/js/owl.carousel.min.js"></script>
    
    <!-- Main Scripts -->
    <script src="<?=BASE_SITE;?>assets/js/main.js"></script>
    <!-- >> /JS
    ============================================================================= -->
</body>
</html>
<?php
    ob_end_flush();
?>
