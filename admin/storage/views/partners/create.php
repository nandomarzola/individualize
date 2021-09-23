<?php $v->layout('../template/_theme'); ?>

<?php $v->insert('../components/nav.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0 text-dark" style="line-height: 70px;">NOVO PARCEIRO</h1>
                </div>
                <div class="col-sm-3">
                    <a href="<?= url('partners')?>" class="btn btn-info float-right"  style="border-radius: 100%; padding:10px; height: 50px; width: 50px; font-size:18px">
                        <i class="fas fa-fast-backward"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background: #fff; padding:20px; border-radius: 10px; width: 98%; border:1px solid #b3aaaa">
        <form method="post" id="create" action="<?= url('partners/save') ?>" enctype="multipart/form-data" data-title="PARCEIRO">
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="imagem" required>
                    <label class="custom-file-label" for="customFile">Selecione o arquivo</label>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" placeholder="Nome do parceiro" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="text" name="link" class="form-control" placeholder="Link do parceiro" required/>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <textarea class="form-control" name="descricao" required rows="5" placeholder="Digite a descrição do parceiro ..."></textarea>
                    </div>
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
