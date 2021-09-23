<?php $v->layout('../template/_theme'); ?>

<div class="login-box" style="margin:10% auto; display: block;">
    <div class="login-logo">
        <a href=""><img src="https://individualizeja.com.br/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image"></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Seja muito bem vindo</p>

            <form action="<?= url('login') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Senha" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Acessar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
