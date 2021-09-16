<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
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
			<div class="col-md-6">
				<h1>Glossário</h1>
			</div>
			<div class="col-md-6 text-right">
				<h2 style="line-height: 40px;">
					<form id="formBusca2-glossario" class="text-center" action="" method="POST">
						<input type="text" class="form-busca" style="margin-top: 0;" placeholder="Digite e pressione a tecla ENTER" name="busca">
					</form>
				</h2>
			</div>
		</div>
		<div class="row preencheBusca">
			<?php

				$resultados = $c->getResults("i9_glossario","WHERE descricao <> '' ORDER BY nome ASC");

				foreach($resultados as $resultado){
					$item = '
						<div class="col-md-6">
							<div class="opt-busca" style="background-color: #ddd; color: #5d5d5d; font-size: 14px;">
								<strong>'.$resultado['nome'].'</strong><br>
								'.$resultado['descricao'].'
							</div>
						</div>
					';
					echo $item;
				}
			?>
		</div>
	</div>
</section>

<?php include("includes/footer.php"); ?>