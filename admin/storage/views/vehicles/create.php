<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">NOVO VEÍCULO</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('vehicles')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa; margin-bottom: 100px">
        <form method="post" id="create" action="<?= url('vehicles/save') ?>" enctype="multipart/form-data" data-title="VEÍCULO">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nome do veículo" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="descricao" required rows="5" placeholder="Digite a descrição da veículo ..."></textarea>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Categoria</label>
                <select class="custom-select rounded-0" name="id_categoria">
                    <?php foreach ($categories as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr/>
            <div class="form-group">
                <label>Sub-Categoria</label>
                <select class="custom-select rounded-0" name="id_subcategoria">
                    <?php foreach ($sub_categories as $value): ?>
                        <option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="formulacao" class="form-control" placeholder="Formulação Sugerida" required>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="fabricar" rows="5" required placeholder="Como Fabrica? ..."></textarea>
                    </div>
                </div>
            </div>
            <hr/>
            <?php for($i=1;$i<21;$i++):?>
                <div class="form-group">
                    <label>Excipiente <?=$i?>:</label>
                    <select class="custom-select rounded-0" name="excipiente<?=$i?>">
                        <option value="">Selecione um Excipiente</option>
                        <?php foreach ($glossary as $activate): ?>
                            <option value="<?= $activate['id'] ?>"><?= $activate['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="composicaoexcipiente<?=$i?>" class="form-control" placeholder="Concentração"/>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php endfor ?>
            <div class="form-group">
                <label>Veículo visível:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ativo" value="1" required>
                    <label class="form-check-label">Sim</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ativo" value="2" required>
                    <label class="form-check-label">Não</label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <button type="submit" class="btn btn-success float-right save" style="border-radius: 100%; height: 50px; width: 50px; font-size:22px"><i class="fa fa-save"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>