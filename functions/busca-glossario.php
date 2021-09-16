<?php 
	
	session_start();

    require_once("../includes/configuracoes.inc.php");

    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/SimpleMail.class.php");
    require_once("../class/Consultas.class.php");

    $c = new Consultas($db);
    $f = new Functions(BASE_SITE);

    $busca = $_POST['busca'];

    $resultados = $c->getResults("i9_glossario","WHERE nome LIKE '%".$busca."%' AND descricao <> '' ORDER BY nome ASC");
	$conta = count($resultados);

	//$formulas = array();

	if($conta <> '') {
		foreach($resultados as $resultado){
			$formula = '
				<div class="col-md-6">
					<div class="opt-busca" style="background-color: #ddd; color: #5d5d5d; font-size: 14px;">
						<strong>'.$resultado['nome'].'</strong><br>
						'.$resultado['descricao'].'
					</div>
				</div>
			';
			echo $formula;
		}
	}

	//echo json_encode($formulas);
?>