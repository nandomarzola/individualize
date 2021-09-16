<?php include("includes/header.php"); ?>

<?php
	$id = $_SESSION['usuarioID'];
	$medico = $c->getResult("i9_medicos","WHERE id = '".$id."'");
?>

<section class="topo-formula">
	<div class="busca-categorias">
		<div class="texto-categorias">Navegue pelas categorias ao lado:</div>
	</div>
</section>

<section class="busca-resultados">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Meu Perfil</h1>
			</div>
		</div>
		<div class="row preencheBusca">
            <div class="col-md-12">
                <div class="opt-busca" style="background-color: #156f8c; color: #5d5d5d; font-size: 14px; height: 400px">
                    <form id="formCadastro" action="<?=BASE_SITE;?>functions/atualiza-cadastro.php" method="POST" enctype="multipart/form-data">
                        <div class="col-md-8 offset-md-2 row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Digite aqui seu nome completo" value="<?= $medico['nome']?>" name="nome" disabled>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Empresa/Clínica" name="empresa" value="<?= $medico['empresa']?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Telefone com DDD" name="telefone" value="<?= $medico['telefone']?>">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Endereço" name="endereco" value="<?= $medico['endereco']?>">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="E-mail" name="email" disabled value="<?= $medico['email']?>">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" placeholder="Senha" name="senha" value="<?= $medico['senha']?>">
                            </div>
                            <div class="col-md-4">
                                <select id="select" class="form-control" name="tipo">
                                    <option value="0" selected disabled>Selecione seu perfil</option>
                                    <option value="1" <?= $medico['tipo'] == 1 ? 'selected' : ''?>>Médico</option>
                                    <option value="2" <?= $medico['tipo'] == 2 ? 'selected' : ''?>>Farmacêutico</option>
                                    <option value="2" <?= $medico['tipo'] == 3 ? 'selected' : ''?>>Outros</option>
                                    <option value="2" <?= $medico['tipo'] == 4 ? 'selected' : ''?>>Funcionário</option>
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
                                    <option value="Ortopedista">Ortopedista</option>
                                    <option value="Pediatra">Pediatra</option>
                                    <option value="Cardiologista">Cardiologista</option>
                                    <option value="Ginecologista">Ginecologista</option>
                                    <option value="Oftalmologista">Oftalmologista</option>
                                    <option value="Ortopedista">Ortopedista</option>
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top: 10px">
                                <select class="form-control segmentoOutros" name="segmento" style="display: none">
                                    <option value="" selected disabled>Selecione sua especialização</option>
                                    <option value="Nutricionista">Nutricionista</option>
                                    <option value="Biomédico">Biomédico</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn">ATUALIZAR</button>
                            </div>
                        </div>
                        <input type="hidden" name="usuario" value="<?= $medico['id']?>" />
                    </form>
                </div>
            </div>
		</div>
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

    });

</script>
