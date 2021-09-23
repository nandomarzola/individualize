<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">NOVA SUB-CATEGORIA</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('sub-categories')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa">
        <form method="post" id="create" action="<?= url('sub-categories/save') ?>" enctype="multipart/form-data" data-title="CATEGORIA">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nome da categoria" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <select class="custom-select rounded-0" required name="id_categoria">
                    <?php foreach ($categories as $item): ?>
                        <option value="<?= $item['id'] ?>"><?= $item['nome'] ?></option>
                    <?php endforeach; ?>
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