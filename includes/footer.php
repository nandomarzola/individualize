<?php $institucional = $c->getResult("i9_institucional","WHERE id = '1'"); ?>
<footer>
	<div class="row">
		<div class="col-md-9">
			<?php echo $institucional['rodape']; ?><br>
			<small>Website por Gabi Thomaz</small>	
		</div>
		<div class="col-md-3 text-right redes">
			<a href="#" target="_blank">
				<i class="fab fa-facebook-f"></i>
			</a>
		</div>
	</div>
</footer>