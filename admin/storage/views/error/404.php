<?php $v->layout('../template/_theme.php'); ?>

<style>
    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Desculpe, ocorreu um erro. Página solicitada não encontrada!
                </div>
                <div class="error-actions">
                    <a href="<?= url('home') ?>" class="btn btn-primary btn-lg">
                        <span class="glyphicon glyphicon-home"></span>
                        Voltar para a home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
