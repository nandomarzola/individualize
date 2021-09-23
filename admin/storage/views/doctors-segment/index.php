<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 50px;">MÉDICOS POR ÁREA DE ATUAÇÃO</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('doctors-segment')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                    <?php if(!empty($data)): ?>
                        <a href="<?= url('doctors-segment/export/'.$_GET['segment'])?>" title="Exportar Médicos" class="btn btn-success float-right"  style="margin-right:10px; border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                            <i class="fas fa-file-excel"></i>
                        </a>
                    <?php endif; ?>
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
                    <div class="col-lg-12"  style="text-align: right">
                        <small>Página <b><?= $paginator->page(); ?></b> de <b><?= $paginator->pages(); ?></b>, Total de registros <b> <?= $total_register[0]['count'] ?></b></small>
                    </div><br/>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Empresa</th>
                            <th>E-mail</th>
                            <th>Segmento</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $key => $d): ?>
                            <tr>
                                <td><?= $d['id']?></td>
                                <td><?= $d['nome']?></td>
                                <td><?= $d['empresa']?></td>
                                <td><?= $d['email']?></td>
                                <td><?= $d['segmento']?></td>
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

