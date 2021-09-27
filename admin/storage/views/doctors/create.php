<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">NOVO MÉDICO</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('doctors')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa">
        <form method="post" id="create" action="<?= url('doctors/save') ?>" enctype="multipart/form-data" data-title="MÉDICO">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome do médico" required>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="empresa" class="form-control" placeholder="Digite o nome da empresa" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="telefone" class="form-control" placeholder="Digite o número de telefone" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="endereco" class="form-control" placeholder="Digite o Endereço" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Digite o e-email" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="password" name="senha" class="form-control" placeholder="Digite uma senha" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Selecione o Estado</label>
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
            <hr/>
            <div class="form-group">
                <label>Logotipo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="imagem" required>
                    <label class="custom-file-label" for="customFile">Selecione o arquivo</label>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Tipo de Cadastro</label>
                <select class="custom-select rounded-0 tipo" name="tipo" required>
                    <option value="">-- Selecione --</option>
                    <option value="1">Médico</option>
                    <option value="3">Outros</option>
                    <option value="4">Funcionário</option>
                </select>
            </div>
            <hr/>
            <div class="form-group segmentoMedico" style="display: none">
                <label>Área de atuação</label>
                <select class="form-control" name="segmento">
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
            <hr class="segmentoMedico" style="display:none" />
            <div class="form-group segmentoOutros" style="display: none">
                <label>Área de atuação</label>
                <select class="form-control segmentoOutrosValue" name="segmento">
                    <option value="" selected disabled>Selecione sua especialização</option>
                    <option value="Esteticista">Esteticista</option>
                    <option value="Cosmetologo">Cosmetólogo</option>
                    <option value="Nutricionista">Nutricionista</option>
                    <option value="Biomedico">Biomédico</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Farmaceutico">Farmacêutico</option>
                </select>
            </div>
            <hr class="segmentoOutros" style="display: none"/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="identificacao" class="form-control identificacao" required placeholder="Digite o código, CRM, CRF, CRBM etc.." disabled/>
                        <input type="hidden" name="tipo_identificacao" class="form-control tipo_identificacao" />
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Status</label>
                <select class="custom-select rounded-0" name="status" required>
                    <option value="1">Habilitado</option>
                    <option value="3">Desabilitado</option>
                </select>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success float-right save" style="border-radius: 100%; height: 50px; width: 50px; font-size:22px"><i class="fa fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(function(){
        $('.tipo').change(function () {
            let tipo = $(this).val();
            let segmentoMedico = $('.segmentoMedico');
            let segmentoOutros = $('.segmentoOutros');
            let identificacao = $('.identificacao');
            var tipoIdentificacao = $('.tipo_identificacao');

            if(tipo == 1){
                segmentoMedico.fadeIn();
                segmentoOutros.fadeOut();
                identificacao.fadeIn();
                identificacao.prop("disabled", false);
                identificacao.attr("placeholder", "CRM");
                tipoIdentificacao.val('CRM');
            }else if(tipo == 3){
                segmentoOutros.fadeIn();
                segmentoMedico.fadeOut();
                identificacao.fadeIn();
                identificacao.attr("placeholder", "CRF");
                identificacao.prop("disabled", false);
                tipoIdentificacao.val('');
            }else{
                segmentoOutros.fadeOut();
                segmentoMedico.fadeOut();
                identificacao.fadeOut();
                tipoIdentificacao.val('');
            }

            identificacao.val('');

        });

        $('.segmentoOutrosValue').on('change', function() {

            var segmentoOutrosValue =  $(this).val();
            var identificacao = $('.identificacao');
            var tipoIdentificacao = $('.tipo_identificacao');

            switch (segmentoOutrosValue) {
                case 'Esteticista':
                case 'Biomedico':
                    identificacao.attr("placeholder", "CRBM");
                    tipoIdentificacao.val("CRBM");
                    break;
                case 'Cosmetologo':
                case 'Farmaceutico':
                    identificacao.attr("placeholder", "CRF");
                    tipoIdentificacao.val("CRF");
                    break;
                case 'Nutricionista':
                    identificacao.attr("placeholder", "CRN");
                    tipoIdentificacao.val("CRN");
                    break;
                case 'Fisioterapeuta':
                    identificacao.attr("placeholder", "CREFITO");
                    tipoIdentificacao.val("CREFITO");
                    break;
            }

            identificacao.prop("disabled", false);

        });
    });
</script>