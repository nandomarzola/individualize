<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<?php 
	if(isset($get[1]) && $get[1]<>''){
    	$categoria_id = $get[1];
    	$subcategoria_id = $get[2];
    	$categoria = $c->getResult("i9_categorias","WHERE id = '".$categoria_id."'");
    	$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$subcategoria_id."'");

    	//$categoria = $c->getResult("i9_categorias","WHERE id = '".$formula['id_categoria']."'");
		//$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$formula['id_subcategoria']."'");
    }
?>

<section class="topo-formula">
	<div class="busca-categorias">
		<?php
			$categorias = $c->getResults("i9_categorias","ORDER BY id DESC");

			foreach($categorias as $cat){
				if($medico['tipo'] == '2') {
					$view = '
						<a href="'.BASE_SITE.'categoria/'.$cat['id'].'">
							<div class="categoria" style="background-color: '.$cat['cor'].';">
								'.$cat['nome'].'
							</div>
						</a>
					';
					echo $view;
				} else {
					if($cat['id'] <> '4') {
						$view = '
							<a href="'.BASE_SITE.'categoria/'.$cat['id'].'">
								<div class="categoria" style="background-color: '.$cat['cor'].';">
									'.$cat['nome'].'
								</div>
							</a>
						';
						echo $view;
					}
				}
			}
		?>
		<div class="texto-categorias">Navegue pelas categorias ao lado:</div>
	</div>
</section>

<section class="busca-resultados">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 style="color: <?php echo $categoria['cor']; ?>"><?php echo $categoria['nome']; ?> - <?php echo $subcategoria['nome']; ?></h1>
			</div>
			<div class="col-md-6 offset-md-6 text-right">
				<h2 style="line-height: 40px;">
					<form id="formBusca32" class="text-center" action="" method="POST">
						Busque por: &nbsp; <input type="text" class="form-busca" style="margin-top: 0;" placeholder="Digite e pressione a tecla ENTER" name="busca">
						<input type="hidden" name="categoria" value="<?php echo $categoria['id']; ?>">
						<input type="hidden" name="subcategoria" value="<?php echo $subcategoria['id']; ?>">
					</form>
				</h2>
			</div>
		</div>
		<div class="row preencheCategoria">
			<?php
			
				if ($categoria['id'] == 10) {
					$resultados = $c->getResults("i9_veiculos","WHERE id_categoria = '".$categoria_id."' AND id_subcategoria = '".$subcategoria_id."' AND (ativo = '1')");
				} else {
					$resultados = $c->getResults("i9_formulas","WHERE id_categoria = '".$categoria_id."' AND id_subcategoria = '".$subcategoria_id."' AND (ativo = '1')");
				}

				foreach($resultados as $resultado){
					$categoria = $c->getResult("i9_categorias","WHERE id = '".$resultado['id_categoria']."'");
					$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$resultado['id_subcategoria']."'");
					if ($categoria['id'] == 10) {
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
				}
			?>
		</div>
	</div>
</section>

<?php include("includes/footer.php"); ?>
