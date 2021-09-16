<?php

    if(!empty($_GET)){
        $url_pesquisada = $_GET['url'];
    }

	ob_start();
    protegePagina($url_pesquisada);

	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<header class="d-flex align-items-center">
	<div class="col-7 col-md-2">
		<div class="logo">
			<a href="<?=BASE_SITE;?>">
				<img src="<?=BASE_SITE;?>assets/img/logo.png">
			</a>
		</div>
	</div>
	<div class="col-md-2 desktop-only">
		<div class="user">
			Olá, <?php echo $medico['nome']; ?>
		</div>
	</div>
	<div class="col-5 col-md-8">
		<ul class="menu">
			<li><a href="<?=BASE_SITE;?>busca">Catálogo</a></li>
			<li><a href="<?=BASE_SITE;?>glossario">Glossário</a></li>
            <li><a href="<?=BASE_SITE;?>perfil">Perfil</a></li>
			<li><a href="<?=BASE_SITE;?>logout">Sair</a></li>
		</ul>
	</div>
</header>