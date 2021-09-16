<?php 
	
	session_start();

    require_once("../includes/configuracoes.inc.php");

    require_once("../class/Functions.class.php");
    require_once("../includes/database.inc.php");
    require_once("../class/SimpleMail.class.php");
    require_once("../class/Consultas.class.php");

    $c = new Consultas($db);
    $f = new Functions(BASE_SITE);

    $id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");

    $busca = $_POST['busca'];

    if($medico['tipo'] == '2') {
    	$resultados = $c->getResults("i9_formulas","WHERE (nome LIKE '%".$busca."%') AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (ativo = '1')");
    	$resultados2 = $c->getResults("i9_veiculos","WHERE (nome LIKE '%".$busca."%') AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (ativo = '1')");

    	$conta = count($resultados + $resultados2);
    } else {
    	$resultados = $c->getResults("i9_formulas","WHERE (nome LIKE '%".$busca."%') AND (ativo = '1') OR (descricao LIKE '%".$busca."%') AND (ativo = '1')");
    	$conta = count($resultados);
    }

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

		if($medico['tipo'] == '2') {
			foreach($resultados2 as $resultado){
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
		}
	}

	//echo json_encode($formulas);
?>
