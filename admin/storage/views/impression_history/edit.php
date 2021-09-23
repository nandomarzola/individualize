<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">EDITAR HISTÓRICO DE IMPRESSÕES</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('impression-history')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa; margin-bottom: 100px">
        <form method="post" id="create" action="<?= url('impression-history/update/'.$impression_history->id) ?>" enctype="multipart/form-data" data-title="HISTÓRICO DE IMPRESSÕES">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Fórmula</label>
                        <select class="custom-select rounded-0" required name="id_medico">
                            <?php foreach ($medicos as $item): ?>
                                <option value="<?= $item['id'] ?>" <?= $item['id'] == $impression_history->id_medico ? 'selected' : ''?>><?= $item['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Médico</label>
                        <select class="custom-select rounded-0" required name="id_formula">
                            <?php foreach ($formulas as $item): ?>
                                <option value="<?= $item['id'] ?>" <?= $item['id'] == $impression_history->id_formula ? 'selected' : ''?>><?= $item['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="posologia" class="form-control" placeholder="Digite a posologia"  value="<?= $impression_history->posologia?>">
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="quantidade" class="form-control" placeholder="Quantidade da formulação"  value="<?= $impression_history->quantidade?>">
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="paciente" class="form-control" placeholder="Digite o nome do paciente"  value="<?= $impression_history->paciente?>" />
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="cidade" class="form-control" placeholder="Digite a cidade"  value="<?= $impression_history->cidade?>" />
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="hora" class="form-control" placeholder="Digite a cidade"  value="<?= convertDate($impression_history->hora)?>" disabled />
                    </div>
                </div>
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