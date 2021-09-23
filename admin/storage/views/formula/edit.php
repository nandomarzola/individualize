<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">EDITAR FÓRMULAS</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('formula')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa; margin-bottom: 100px">
        <form method="post" id="create" action="<?= url('formula/update/'.$formula['id']) ?>" enctype="multipart/form-data" data-title="FÓRMULA">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nome da fórmula" required value="<?= $formula['nome']?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="descricao" required rows="5" placeholder="Digite a descrição da fórmula ..."><?= $formula['descricao'] ?></textarea>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Categoria</label>
                <select class="custom-select rounded-0" name="id_categoria">
                    <?php foreach ($categories as $item): ?>
                        <option value="<?= $item['id'] ?>" <?= $formula['id_categoria'] == $item['id'] ? 'selected' : ''?>><?= $item['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr/>
            <div class="form-group">
                <label>Sub-Categoria</label>
                <select class="custom-select rounded-0" name="id_subcategoria">
                    <?php foreach ($sub_categories as $value): ?>
                        <option value="<?= $value['id'] ?>" <?= $formula['id_subcategoria'] == $value['id'] ? 'selected' : ''?>><?= $value['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="formulacao" class="form-control" placeholder="Formulação Sugerida" value="<?= $formula['formulacao']?>" required>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="fabricar" rows="5" required placeholder="Como Fabrica? ..."><?= $formula['fabricar']?></textarea>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="veiculo" class="form-control" placeholder="Veículo" value="<?= $formula['veiculo']?>" required>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Veículo</label>
                <select class="custom-select rounded-0" required name="veiculo2">
                    <?php foreach ($vehicles as $vehicle): ?>
                        <option value="<?= $vehicle['id'] ?>" <?= $formula['veiculo2'] == $vehicle['id'] ? 'selected' : ''?>><?= $vehicle['nome'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <hr/>
            <?php for($i=1;$i<21;$i++):?>
                <div class="form-group">
                    <label>Ativo <?=$i?>:</label>
                    <select class="custom-select rounded-0" name="ativo<?=$i?>">
                        <option value="">Selecione um ativo</option>
                        <?php foreach ($glossary as $activate): ?>
                            <option value="<?= $activate['id'] ?>" <?= $formula['ativo'.$i] == $activate['id'] ? 'selected' : ''?>><?= $activate['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" name="composicaoativo<?=$i?>" class="form-control" value="<?= $formula['composicaoativo'.$i] ?>" placeholder="Concentração"/>
                        </div>
                    </div>
                </div>
                <hr/>
            <?php endfor ?>
            <div class="form-group">
                <label>Fórmula visível:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ativo" value="1" required <?= $formula['ativo'] == 1 ? 'checked' : ''?>>
                    <label class="form-check-label">Sim</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="ativo" value="2" required <?= $formula['ativo'] == 2 ? 'checked' : ''?>>
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