<?php

    $id = $_SESSION['usuarioID'];
    if(!empty($id)){
        header("Location: busca");
    }
?>

<header class="d-flex align-items-center">
    <div class="col-md-2">
        <div class="logo">
            <a href="<?=BASE_SITE;?>">
                <img src="<?=BASE_SITE;?>assets/img/logo.png">
            </a>
        </div>
    </div>
    <div class="col-md-10">
        <ul class="menu">
            <li><a href="<?=BASE_SITE;?>">Voltar à Home</a></li>
        </ul>
    </div>
</header>
<style>
    .btn{
        background-color: #0c4152 !important;
        color: #fff !important;
        cursor: pointer;
        width: 65%;
    }
    .recuperarSenha{
        text-decoration: underline;
    }
</style>

<section class="topo-interna d-flex align-items-center">
    <div class="container loginForm">
        <div class="col-md-12">
            <h1 class="text-center">Acessar Plataforma</h1>
        </div>
        <form id="formCadastro" action="<?=BASE_SITE;?>includes/valida.php" method="POST">
            <div class="col-md-8 offset-md-2 row">
                <div class="col-md-8" style="margin:0 auto">
                    <input type="text" class="form-control" placeholder="Digite seu E-mail" name="usuario">
                </div>
                <div class="col-md-8" style="margin:0 auto">
                    <input type="password" class="form-control" placeholder="Digite sua senha" name="senha">
                </div>
                <div class="col-md-12" style="margin-left: 119px;">
                    <a href="#" class="recuperarSenha">Esqueci minha senha</a>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn">ACESSAR</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Recuperar senha -->
    <div class="container senhaForm" style="display: none">
        <div class="col-md-12">
            <h1 class="text-center">Recuperar senha</h1>
        </div>
        <form id="formCadastro" action="<?=BASE_SITE;?>functions/recuperar-senha.php" method="POST">
            <div class="col-md-8 offset-md-2 row">
                <div class="col-md-8" style="margin:0 auto">
                    <input type="text" class="form-control" placeholder="Digite seu E-mail" name="email">
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn">RECUPERAR SENHA</button>
                </div>
            </div>
        </form>
    </div>
</section>


<?php include("includes/footer.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(function () {
        $('.recuperarSenha').click(function (e) {

            e.preventDefault();

            $('.loginForm').hide();
            $('.senhaForm').fadeIn(1500);
        })
    })
</script>