<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<?php 
	if(isset($get[1]) && $get[1]<>''){
    	$formula_id = $get[1];
    	$formula = $c->getResult("i9_formulas","WHERE id = '".$formula_id."'");

    	$categoria = $c->getResult("i9_categorias","WHERE id = '".$formula['id_categoria']."'");
		$subcategoria = $c->getResult("i9_subcategorias","WHERE id = '".$formula['id_subcategoria']."'");
    }

    $data = strftime( '%d/%m/%Y', strtotime('today') );
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

<section class="formula">
	<div class="container">
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
					Veículo
				</div>
			</div>

			<div class="col-md-6 nospace tb-ativo">
				<div class="mobile-tipo">Ativos</div>
				<?php foreach (range(1, 20) as $i) { ?>
					<?php if( $formula[('ativo'.$i)] <> '0' OR $formula[('ativo'.$i)] <> ''){ ?>
						<?php $glossario = $c->getResult("i9_glossario","WHERE id = '".$formula[('ativo'.$i)]."'"); ?>
<?php $veic = $c->getResult("i9_veiculos","WHERE id = '".$formula['veiculo2']."'"); ?>
						<?php if ($formula[('composicaoativo'.$i)] <> '') { ?>
							<div class="item row">
								<div class="col-6 col-md-8">
									<?php if($glossario['descricao'] <> ''){ ?>
										<span data-toggle="tooltip" data-placement="top" title="<?php echo strip_tags($glossario['descricao']); ?>"><?php echo $glossario['nome']; ?></span>
									<?php } else { ?>
										<?php echo $glossario['nome']; ?>
									<?php } ?>
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
				<div class="mobile-tipo">Veículo</div>
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
		<?php if($medico['tipo'] == '1' || $medico['tipo'] == '2') { ?>
			<form id="formImprimir" action="<?=BASE_SITE;?>functions/imprimir.php" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="formula" value="<?php echo $formula['id']; ?>">
						<input type="hidden" name="user" value="<?php echo $medico['id']; ?>">
						<input style="margin-bottom: 10px;" type="text" class="form-formula" name="quantidade" placeholder="Digite aqui a quantidade da formulação" value="<?php echo $formula['formulacao']; ?>">
						<input style="margin-bottom: 10px;" type="text" class="form-formula" name="posologia" placeholder="Digite aqui a posologia">
						<input type="text" disabled="true" class="form-formula" name="data" value="<?php echo $data; ?>">
					</div>
					<div class="col-md-6">
						<input style="margin-bottom: 10px;" type="text" class="form-formula" name="paciente" placeholder="Digite aqui o nome do paciente">
						<input style="margin-bottom: 10px;" type="text" class="form-formula" name="cidade" placeholder="Digite aqui a cidade do paciente">
						<button type="submit" class="btn" style="background-color: <?php echo $categoria['cor']; ?>; margin-top: 0;">Pré-visualizar e Imprimir</button>
					</div>
				</div>
			</form>
		<?php } ?>
		<?php /*if($medico['tipo'] == '2') { ?>
			<?php if($formula['formulacao'] <> '') { ?>
				<p><strong>Quantidade da formulação sugerida: <?php echo $formula['formulacao']; ?></strong></p>
			<?php } ?>
			<?php if($formula['fabricar'] <> '') { ?>
				<p><strong>Como fabricar:</strong><br>
					<?php echo $formula['fabricar']; ?>
				</p>
			<?php } ?>
		<?php } */?>
	</div>
</section>

<?php include("includes/footer.php"); ?>