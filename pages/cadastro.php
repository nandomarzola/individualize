<?php

$id = $_SESSION['usuarioID'];
if(!empty($id)){
    header("Location: busca");
}
?>

<header class="d-flex align-items-center">
	<div class="col-md-2">
		<div class="logo">
			<a href="<?=BASE_SITE;?>">
				<img src="<?=BASE_SITE;?>assets/img/logo.png">
			</a>
		</div>
	</div>
	<div class="col-md-10">
		<ul class="menu">
			<li><a href="<?=BASE_SITE;?>">Voltar à Home</a></li>
		</ul>
	</div>
</header>

<section class="topo-interna d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="text-align: center">
				<h1 class="text-center">Faça seu cadastro</h1>
                <small class="text-center" style="color:red">O único campo não obrigatório é a logo, por favor preencha todos os outros campos</small>
			</div>
		</div>
		<form id="formCadastro" action="<?=BASE_SITE;?>functions/cadastro.php" method="POST" enctype="multipart/form-data">
			<div class="col-md-8 offset-md-2 row">
				<div class="col-md-12">
					<input type="text" class="form-control" placeholder="Digite aqui seu nome completo" name="nome">
				</div>
				<div class="col-md-6 empresa">
					<input type="text" class="form-control" placeholder="Empresa/Clínica" name="empresa">
				</div>
				<div class="col-md-6 identificacao">
					<input type="text" disabled="disabled" class="form-control troca-tipo" placeholder="Selecione seu perfil abaixo" name="identificacao">
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Telefone com DDD" name="telefone">
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Endereço" name="endereco">
				</div>
                <div class="col-md-2">
                    <select class="form-control" name="UF" style="height: 40px">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>
				<div class="col-md-6">
					<input type="email" class="form-control" placeholder="E-mail" name="email">
				</div>
				<div class="col-md-6">
					<input type="password" class="form-control" placeholder="Senha" name="senha">
				</div>
                <div class="col-md-4">
                    <select id="select" class="form-control tipo" name="tipo">
                        <option value="0" selected disabled>Selecione seu perfil</option>
                        <option value="1">Médico</option>
                        <option value="3">Outros</option>
                        <option value="4">Funcionário</option>
                    </select>
                </div>
				<div class="col-md-8">
					<div class="wrap-foto">
						<span class="file-wrapper">
							<input type="file" class="form-control anexa" name="logo" id="logo">
						</span>
						<div class="btnupload">Faça o upload do logo da sua clínica (não obrigatório)</div>
					</div>
				</div>
                <div class="col-md-12" style="margin-top: 10px">
                    <select class="form-control segmentoMedico" name="segmento" style="display: none">
                        <option value="" selected disabled>Selecione sua especialização</option>
                        <option value="Dermatologista">Dermatologista</option>
                        <option value="Cirurgiao Plastico">Cirurgião Plástico</option>
                        <option value="Pediatra">Pediatra</option>
                        <option value="Neurologista">Neurologista</option>
                        <option value="Ortopedista">Ortopedista</option>
                        <option value="Endocrinologista">Endocrinologista</option>
                        <option value="Reumatologista">Reumatologista</option>
                        <option value="Gastroenterologista">Gastroenterologista</option>
                        <option value="Cardiologista">Cardiologista</option>
                        <option value="Ginecologista">Ginecologista</option>
                        <option value="Veterinario">Veterinário</option>
                        <option value="Geriatra">Geriatra</option>
                        <option value="Nutrologo">Nutrólogo</option>
                        <option value="Oftalmologista">Oftalmologista</option>
                        <option value="Ortomolecular">Ortomolecular</option>
                    </select>
                </div>
                <div class="col-md-12" style="margin-top: 10px">
                    <select class="form-control segmentoOutros" name="segmento" style="display: none">
                        <option value="" selected disabled>Selecione sua especialização</option>
                        <option value="Esteticista">Esteticista</option>
                        <option value="Cosmetologo">Cosmetólogo</option>
                        <option value="Nutricionista">Nutricionista</option>
                        <option value="Biomedico">Biomédico</option>
                        <option value="Fisioterapeuta">Fisioterapeuta</option>
                        <option value="Farmaceutico">Farmacêutico</option>
                    </select>
                </div>
				<div class="col-md-12 text-center">
					<button type="submit" class="btn">Cadastrar</button>
				</div>
			</div>
		</form>
	</div>
</section>

<?php include("includes/footer.php"); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>


<script type="text/javascript">
	setInterval(function(){
	    var filename = $('.anexa').val().replace(/C:\\fakepath\\/i, '');
	    if(filename != ''){
	        $(".btnupload").text(filename);
	    }
	 }, 500);


	$('#select').on('change', function() {
	  var valor = this.value;

	  if(valor == '1'){
	      $('.segmentoMedico').fadeIn();
      }else{
	      $('.segmentoMedico').val('');
	      $('.segmentoMedico').fadeOut();
      }

	  if(valor == '3'){
          $('.segmentoOutros').fadeIn();
      }else{
          $('.segmentoOutros').val('');
          $('.segmentoOutros').fadeOut();
      }

        if(valor == '1') {
            $('.troca-tipo').attr("placeholder", "CRM");
            $('.troca-tipo').prop("disabled", false);
        } else if(valor == '3') {
            $('.troca-tipo').attr("placeholder", "CRF");
            $('.troca-tipo').prop("disabled", false);
        } else {
            $('.troca-tipo').prop("disabled", true);
            $('.troca-tipo').attr("placeholder", "Selecione o perfil");
        }

	});
    $('.segmentoOutros').on('change', function() {
        var segmentoOutros =  $(this).val();
        switch (segmentoOutros) {
                case 'Esteticista':
                case 'Biomedico':
                    $('.troca-tipo').attr("placeholder", "CRBM");
                    break;
                case 'Cosmetologo':
                    $('.troca-tipo').attr("placeholder", "CRF");
                    break;
                case 'Nutricionista':
                    $('.troca-tipo').attr("placeholder", "CRN");
                    break;
                case 'Fisioterapeuta':
                    $('.troca-tipo').attr("placeholder", "CREFITO");
                    break;
                case 'Farmaceutico':
                    $('.troca-tipo').attr("placeholder", "CRF");
                    break;
        }
        $('.troca-tipo').prop("disabled", false);
    });

</script>