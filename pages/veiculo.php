<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<?php 
	if(isset($get[1]) && $get[1]<>''){
    	$formula_id = $get[1];
    	$formula = $c->getResult("i9_veiculos","WHERE id = '".$formula_id."'");

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
			<div class="col-md-6 nospaceright">
				<div class="ttl-tipo">
					Excipiente
				</div>
			</div>
			<div class="col-md-6 nospaceleft">
				<div class="ttl-tipo text-center">
					Concentração
				</div>
			</div>

			<div class="col-md-12 nospace tb-ativo">
				<div class="mobile-tipo">Excipientes</div>
				<?php foreach (range(1, 20) as $i) { ?>
					<?php if( $formula[('excipiente'.$i)] <> '0' OR $formula[('excipiente'.$i)] <> ''){ ?>
						<?php $glossario = $c->getResult("i9_glossario","WHERE id = '".$formula[('excipiente'.$i)]."'"); ?>
						<?php if ($formula[('composicaoexcipiente'.$i)] <> '') {?>
							<div class="item row">
								<div class="col-6 col-md-8">
									<?php if($glossario['descricao'] <> ''){ ?>
										<span data-toggle="tooltip" data-placement="top" title="<?php echo $glossario['descricao']; ?>"><?php echo $glossario['nome']; ?></span>
									<?php } else { ?>
										<?php echo $glossario['nome']; ?>
									<?php } ?>
								</div>
								<div class="col-6 col-md-4 text-center">
									<?php echo $formula[('composicaoexcipiente'.$i)]; ?>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="col-md-12">
				<div class="final"></div>
			</div>
		</div>
		<?php if($formula['formulacao'] <> '') { ?>
			<p><strong>Quantidade da formulação sugerida: <?php echo $formula['formulacao']; ?></strong></p>
		<?php } ?>
		<?php if($formula['fabricar'] <> '') { ?>
			<p><strong>Como fabricar:</strong><br>
				<?php echo $formula['fabricar']; ?>
			</p>
		<?php } ?>
	</div>
</section>

<?php include("includes/footer.php"); ?>