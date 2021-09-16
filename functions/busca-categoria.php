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
    $categoria = $_POST['categoria'];

    if ($categoria == '4') {
    	$resultados = $c->getResults("i9_veiculos","WHERE (nome LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1')");
    } else {
    	$resultados = $c->getResults("i9_formulas","WHERE (nome LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1')");
    }

    $resultados = $c->getResults("i9_formulas","WHERE (nome LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (id_categoria = ".$categoria.") AND (ativo = '1')");
	$conta = count($resultados);

	//$formulas = array();

	if($conta <> '') {
		foreach($resultados as $resultado){
			$categoria = $c->getResult("i9_categorias","WHERE id = '".$resultado['id_categoria']."'");
			$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$resultado['id_subcategoria']."'");
			if ($categoria['id'] == '4') {
				$formula = '
					<div class="col-md-6">
						<a href="'.BASE_SITE.'veiculo/'.$resultado['id'].'" target="_blank">
							<div class="opt-busca" style="background-color: '.$categoria['cor'].';">
								<small>'.$subcategoria['nome'].'</small><br>
								'.$resultado['nome'].'
							</div>
						</a>
					</div>
				';
			} else {
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
			}
			echo $formula;
			//$formulas += [ $formula ];
		}
	} else {
		echo '<div class="col-md-12"><p>Nenhum resultado encontrado.</p></div>';
	}

	//echo json_encode($formulas);
?>
