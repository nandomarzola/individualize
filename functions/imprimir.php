<?php 
	session_start();

    require_once("../includes/configuracoes.inc.php");

    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/SimpleMail.class.php");
    require_once("../class/Consultas.class.php");

    $c = new Consultas($db);
    $f = new Functions(BASE_SITE);

    $formula_id = $_POST['formula'];
    $user_id = $_POST['user'];
    $quantidade = $_POST['quantidade'];
    $posologia = $_POST['posologia'];
    $paciente = $_POST['paciente'];
    $cidade = $_POST['cidade'];
    $data = date('Y-m-d H:i:s');
    $data_tratada = strftime( '%d/%m/%Y', strtotime('today') );

    $formula = $c->getResult("i9_formulas","WHERE id = '".$formula_id."'");

    $categoria = $c->getResult("i9_categorias","WHERE id = '".$formula['id_categoria']."'");
	$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$formula['id_subcategoria']."'");

	$medico = $c->getResult("i9_medicos","WHERE id = '".$user_id."'");

	if($formula_id <> '' || $user_id <> '' || $paciente <> '') {
		$insert = $db->query("INSERT into i9_impressoes (id,id_medico,id_formula,hora,paciente,cidade,posologia,quantidade) VALUES ('','".$user_id."','".$formula_id."','".$data."','".$paciente."','".$cidade."','".$posologia."','".$quantidade."')"); 
	} else {
		echo '<script type="text/javascript">alert("Ocorreu um erro."); location.href="'.BASE_SITE.'"</script>';
	}
?>

<style>
	.info-medico {
	    margin-bottom: 50px;
	    font-size: 16px;
	}

	.info-medico2 {
		font-size: 16px;
	    line-height: 20px;
	}

	.info-medico img {
		max-height: 50px !important;
		max-width: 100% !important;
	}

	.formula {
		padding: 30px 0 !important;
		text-align: justify;
	}

	.formula:before, .formula:after { 
		visibility: hidden; 
	} 

	.formula .container {
		width: 80%;
		margin-left: 10%;
	}

	.formula .row {
		display: flex;
    	flex-wrap: wrap;
	}

	.formula .btn {
		padding: 0 !important;
		margin-top: 20px;
	}

	.tabela-formula .titulo {
		background-color: #4e9bb5;
	    color: #fff;
	    font-size: 18px;
	    padding: 5px 10px;
	    margin-top: 20px;
	}

	.tabela-formula .ttl-tipo {
		font-size: 16px !important;
	}

	.nospace {
		margin: 0;
		padding: 0;
	}

	.nospaceright {
		margin: 0;
		padding: 0 !important;
	}

	.nospaceleft {
		margin: 0;
		padding: 0 !important;
	}

	.col-md-2 {
		flex: 0 0 16.666667%;
		width: 16.666667%;
	}

	.col-md-3 {
		flex: 0 0 25%;
   		width: 25%;
	}

	.col-md-4 {
		flex: 0 0 33.333333%;
    	width: 33.333333%;
	}

	.col-md-6 {
		flex: 0 0 50%;
		width: 50%;
	}

	.col-md-8 {
	    flex: 0 0 66.666667%;
	    width: 66.666667%;
	}

	.col-md-9 {
		flex: 0 0 75%;
   		width: 75%;
	}

	.col-md-12 {
		flex: 0 0 100%;
    	width: 100%;
	}

	.text-center {
		text-align: center;
	}
</style>

<style type="text/css" media="print">
	@page {
		size: auto;   /* auto is the initial value */
		margin: 0;  /* this affects the margin in the printer settings */
	}

	.info-medico {
	    margin-bottom: 50px;
	}

	.info-medico2 {
		font-size: 16px;
	    line-height: 20px;
	}

	.info-medico img {
		max-height: 50px !important;
		max-width: 100% !important;
	}

	.info-medico .add {
		padding-left: 20px !important;
	}

	.btn, .formula:before, .formula:after { 
		visibility: hidden; 
	} 

	.formula .container {
		width: 80%;
		margin-left: 10%;
		text-align: justify;
	}

	.formula .row {
		display: flex;
    	flex-wrap: wrap;
	}

	.tabela-formula .titulo {
	    color: #4e9bb5 !important;
	    font-size: 18px;
	    padding: 5px 0px !important;
	    margin-top: 20px;
	    margin-bottom: 20px;
	}

	.tabela-formula .ttl-tipo {
		font-size: 13px !important;
	}

	.nospace {
		margin: 0;
		padding: 0;
	}

	.nospaceright {
		margin: 0;
		padding: 0;
	}

	.nospaceleft {
		margin: 0;
		padding: 0;
	}

	.col-md-2 {
		flex: 0 0 16.666667%;
		width: 16.666667%;
	}

	.col-md-3 {
		flex: 0 0 25%;
   		width: 25%;
	}

	.col-md-4 {
		flex: 0 0 33.333333%;
    	width: 33.333333%;
	}

	.col-md-6 {
		flex: 0 0 50%;
		width: 50%;
	}

	.col-md-8 {
	    flex: 0 0 66.666667%;
	    width: 66.666667%;
	}

	.col-md-9 {
		flex: 0 0 75%;
   		width: 75%;
	}

	.col-md-12 {
		flex: 0 0 100%;
    	width: 100%;
	}

	.text-center {
		text-align: center;
	}

	.print:last-child {
	     page-break-after: auto !important;
	}

	html, body {
        height: 99% !important;    
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <base href="<?=BASE_SITE?>" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />
    <title><?=NOME_SITE?></title>

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/animate.css">
    <link rel="stylesheet" href="<?=BASE_SITE;?>assets/css/main.css">

</head>
<body class="_tr">
	<section class="formula">
		<div class="container">
			<div class="row info-medico">
				<div class="col-md-3">
					<img src="<?=BASE_SITE;?>assets/img/uploads/<?php echo $medico['logo']; ?>">
				</div>
				<div class="col-md-6 add">
					<strong>Paciente: </strong><?php echo $paciente;?><br>
					<strong>Local: </strong><?php echo $cidade;?> - <?php echo $data_tratada;?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h1 style="color: <?php echo $categoria['cor']; ?>"><?php echo $subcategoria['nome']; ?></h1>
					<?php echo $formula['descricao']; ?>
				</div>
			</div>
			<div class="tabela-formula row">
				<div class="col-md-12">
					<div class="titulo">
						<?php echo $formula['nome']; ?>
					</div>
				</div>
				<div class="col-md-4 nospaceright">
					<div class="ttl-tipo">
						Ativo
					</div>
				</div>
				<div class="col-md-2 nospace">
					<div class="ttl-tipo text-center">
						Concentração
					</div>
				</div>
				<div class="col-md-6 nospaceleft">
					<div class="ttl-tipo">
						&nbsp; &nbsp;Veículo
					</div>
				</div>

				<div class="col-md-6 nospace tb-ativo">
					<?php foreach (range(1, 20) as $i) { ?>
						<?php if( $formula[('ativo'.$i)] <> '0' OR $formula[('ativo'.$i)] <> ''){ ?>
							<?php $glossario = $c->getResult("i9_glossario","WHERE id = '".$formula[('ativo'.$i)]."'"); ?>
							<?php $veic = $c->getResult("i9_veiculos","WHERE id = '".$formula['veiculo2']."'"); ?>
							<?php if ($formula[('composicaoativo'.$i)] <> '') {?>
								<div class="item row">
									<div class="col-6 col-md-8">
										<?php echo $glossario['nome']; ?>
									</div>
									<div class="col-6 col-md-4 text-center">
										<?php echo $formula[('composicaoativo'.$i)]; ?>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					<?php } ?>
				</div>

				<div class="col-md-6 nospace tb-excipiente">
					<div class="item row">
						<div class="col-12">
							<?php echo $veic['nome']; ?>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="final"></div>
				</div>
			</div>
			<div class="row info-medico2">
				<div class="col-md-12">
					<strong>
						QUANTIDADE DA FORMULAÇÃO: <?php echo $quantidade; ?><br>
						POSOLOGIA: <?php echo $posologia; ?>
					</strong><br><br><br>
					<strong><?php echo $medico['nome']; ?></strong> - CRM <?php echo $medico['crm']; ?><br>
					<?php echo $medico['empresa']; ?> - <?php echo $medico['endereco']; ?> | Telefone: <?php echo $medico['telefone']; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="btn" style="background-color: <?php echo $categoria['cor']; ?>" onclick="window.print(); return false;">Imprimir</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
