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

    $resultados = $c->getResults("i9_formulas",
			"
				LEFT JOIN i9_glossario as glossario1 ON glossario1.id = i9_formulas.ativo1
				LEFT JOIN i9_glossario as glossario2 ON glossario2.id = i9_formulas.ativo2
				LEFT JOIN i9_glossario as glossario3 ON glossario3.id = i9_formulas.ativo3
				LEFT JOIN i9_glossario as glossario4 ON glossario4.id = i9_formulas.ativo4
				LEFT JOIN i9_glossario as glossario5 ON glossario5.id = i9_formulas.ativo5
				LEFT JOIN i9_glossario as glossario6 ON glossario6.id = i9_formulas.ativo6
				LEFT JOIN i9_glossario as glossario7 ON glossario7.id = i9_formulas.ativo7
				LEFT JOIN i9_glossario as glossario8 ON glossario8.id = i9_formulas.ativo8
				LEFT JOIN i9_glossario as glossario9 ON glossario9.id = i9_formulas.ativo9
				LEFT JOIN i9_glossario as glossario10 ON glossario10.id = i9_formulas.ativo10
				LEFT JOIN i9_glossario as glossario11 ON glossario11.id = i9_formulas.ativo11
				LEFT JOIN i9_glossario as glossario12 ON glossario12.id = i9_formulas.ativo12
				LEFT JOIN i9_glossario as glossario13 ON glossario13.id = i9_formulas.ativo13
				LEFT JOIN i9_glossario as glossario14 ON glossario14.id = i9_formulas.ativo14
				LEFT JOIN i9_glossario as glossario15 ON glossario15.id = i9_formulas.ativo15
				LEFT JOIN i9_glossario as glossario16 ON glossario16.id = i9_formulas.ativo16
				LEFT JOIN i9_glossario as glossario17 ON glossario17.id = i9_formulas.ativo17
				LEFT JOIN i9_glossario as glossario18 ON glossario18.id = i9_formulas.ativo18
				LEFT JOIN i9_glossario as glossario19 ON glossario19.id = i9_formulas.ativo19
				LEFT JOIN i9_glossario as glossario20 ON glossario20.id = i9_formulas.ativo20
			",
		"WHERE 
		(i9_formulas.id_categoria <> 4) AND 
		(i9_formulas.nome LIKE '%".$busca."%') AND 
		(i9_formulas.ativo = '1') OR (i9_formulas.id_categoria <> 4) AND
		(i9_formulas.descricao LIKE '%".$busca."%') AND 
		(i9_formulas.ativo = '1') AND
		(glossario1.nome LIKE '%".$busca."%') OR
		(glossario2.nome LIKE '%".$busca."%') OR
		(glossario3.nome LIKE '%".$busca."%') OR
		(glossario4.nome LIKE '%".$busca."%') OR
		(glossario5.nome LIKE '%".$busca."%') OR
		(glossario6.nome LIKE '%".$busca."%') OR
		(glossario7.nome LIKE '%".$busca."%') OR
		(glossario8.nome LIKE '%".$busca."%') OR
		(glossario9.nome LIKE '%".$busca."%') OR
		(glossario10.nome LIKE '%".$busca."%') OR
		(glossario11.nome LIKE '%".$busca."%') OR
		(glossario12.nome LIKE '%".$busca."%') OR
		(glossario13.nome LIKE '%".$busca."%') OR
		(glossario14.nome LIKE '%".$busca."%') OR
		(glossario15.nome LIKE '%".$busca."%') OR
		(glossario16.nome LIKE '%".$busca."%') OR
		(glossario17.nome LIKE '%".$busca."%') OR
		(glossario18.nome LIKE '%".$busca."%') OR
		(glossario19.nome LIKE '%".$busca."%') OR
		(glossario20.nome LIKE '%".$busca."%') 
		
		");
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
