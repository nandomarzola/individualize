<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 50px;">MÉDICOS POR ÁREA DE ATUAÇÃO</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de médicos</h3>
                </div>
                <div class="card-body">
                    <form method="get" action="<?= url('doctors-segment/selected') ?>" enctype="multipart/form-data" data-title="FÓRMULA">
                        <div class="row">
                            <div class="col-lg-10">
                                <label>Selecione o Segmento</label>
                                <select class="custom-select rounded-0" name="segment">
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
                                    <option value="Esteticista">Esteticista</option>
                                    <option value="Cosmetologo">Cosmetólogo</option>
                                    <option value="Nutricionista">Nutricionista</option>
                                    <option value="Biomedico">Biomédico</option>
                                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                                    <option value="Farmaceutico">Farmacêutico</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success float-right save" style="margin-top: 30px">Buscar Médicos</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

