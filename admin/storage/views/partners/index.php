<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 50px;">PARCEIROS</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('partners/create') ?>" title="Novo Pareiro" class="btn btn-info float-right" style="border-radius: 100%; height: 50px; width: 50px; font-size:22px">
                        <i class="fa fa-image"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Institucional</h3>
                </div>
                <div class="card-body">
                    <div class="col-lg-12"  style="text-align: right">
                        <small>Página <b><?= $paginator->page(); ?></b> de <b><?= $paginator->pages(); ?></b>, Total de registros <b> <?= $total_register[0]['count'] ?></b></small>
                    </div><br/>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagem</th>
                            <th style="text-align: center">Editar</th>
                            <th style="text-align: center">Deletar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $d): ?>
                            <tr>
                                <td><?= $d['id']?></td>
                                <td><img src="<?= '/../../admin/'.$d['imagem']?>" alt="logo parceiro" style="width: 300px; max-height: 150px" /></td>
                                <td style="text-align: center;">
                                    <a href="<?= url('partners/'.$d['id'].'/edit')?>" class="btn btn-info btn-sm" title="Editar" style="width: 40px;"><i class="fa fa-edit"></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="<?= url('partners/'.$d['id'].'/delete')?>" class="btn btn-danger btn-sm" title="Deletar" style="width: 40px;"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <?= $paginator->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

