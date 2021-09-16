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

    $resultados = $c->getResults("i9_formulas","WHERE (id_categoria <> 4) AND (nome LIKE '%".$busca."%') AND (ativo = '1') OR (id_categoria <> 4) AND (descricao LIKE '%".$busca."%') AND (ativo = '1')");
	$conta = count($resultados);

	//$formulas = array();

	if($conta <> '') {
		foreach($resultados as $resultado){
			$categoria = $c->getResult("i9_categorias","WHERE id = '".$resultado['id_categoria']."'");
			$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$resultado['id_subcategoria']."'");
			$formula = '
				<div class="col-md-6">
					<a href="'.BASE_SITE.'formula/'.$resultado['id'].'" target="_blank">
						<div class="opt-busca" style="background-color: '.$categoria['cor'].';">
							<small>'.$subcategoria['nome'].'</small><br>
							'.$resultado['nome'].'
						</div>
					</a>
				</div>
			';
			echo $formula;
			//$formulas += [ $formula ];
		}
	}

	//echo json_encode($formulas);
?>
