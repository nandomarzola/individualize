<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<section class="topo-busca d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center">Digite sua busca</h1>
				<p class="text-center">
					Nós reconhecemos termos, frases e palavras-chave da sua fórmula:
				</p>

				<?php if($medico['tipo'] == '2') { ?>
					<form id="formBusca" class="text-center" action="" method="POST">
						<input type="text" class="form-busca" placeholder="Digite e pressione a tecla ENTER" name="busca">
					</form>
				<?php } else { ?>
					<form id="formBusca-medico" class="text-center" action="" method="POST">
						<input type="text" class="form-busca" placeholder="Digite e pressione a tecla ENTER" name="busca">
					</form>
				<?php } ?>
			</div>
		</div>
	</div>
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
		<div class="texto-categorias">Navegue pelas categorias:</div>
	</div>
</section>

<section class="busca-resultados" id="busca">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h2 style="line-height: 40px;">
					Você buscou por: <span class="nome-busca"></span>
				</h2>
			</div>
			<div class="col-md-6 text-right">
				<h2 style="line-height: 40px;">
					<?php if($medico['tipo'] == '2') { ?>
						<form id="formBusca2" class="text-center" action="" method="POST">
							Busque por: &nbsp; <input type="text" class="form-busca" style="margin-top: 0;" placeholder="Digite e pressione a tecla ENTER" name="busca">
						</form>
					<?php } else { ?>
						<form id="formBusca2-medico" class="text-center" action="" method="POST">
							Busque por: &nbsp; <input type="text" class="form-busca" style="margin-top: 0;" placeholder="Digite e pressione a tecla ENTER" name="busca">
						</form>
					<?php } ?>
				</h2>
			</div>
		</div>
		<div class="row preencheBusca"></div>
	</div>
</section>

<?php include("includes/footer.php"); ?>