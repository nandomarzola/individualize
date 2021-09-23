<?php $institucional = $c->getResult("i9_institucional","WHERE id = '1'"); ?>
<footer>
    <style>
        .politica_privacidade:hover{
            text-decoration: underline !important;
        }
    </style>
	<div class="row">
		<div class="col-md-9">
			<?php echo $institucional['rodape']; ?><br>
            <small>Website por Gabi Thomaz</small><br/>
            <small><a class="politica_privacidade" href="<?=BASE_SITE.'/politica-de-privacidade.php'?>" target="_blank">
                Política de privacidade
            </a></small>
		</div>
		<div class="col-md-3 text-right redes">
			<a href="#" target="_blank">
				<i class="fab fa-facebook-f"></i>
			</a>
		</div>
	</div>
</footer>