
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav">
        <form class="form-inline ml-6" id="formSearch">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar search" name="search" type="text" placeholder="Procurar" aria-label="Search" value="<?= $_GET['search'] ?? ''?>">
                <input type="hidden" name="segment" value="<?=$_GET['segment']?>"/>
                <div class="input-group-append">
                    <button class="btn btn-navbar">
                        <i class="fa fa-ban clear_search"></i>
                    </button>
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?= url('logout') ?>" role="button">
                Sair
            </a>
        </li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="<?= url('home') ?>" class="brand-link" style="height: 50px">
    <img src="https://individualizeja.com.br/assets/img/logo.png" alt="AdminLTE Logo" class="brand-image" style="margin-left: 50px;">
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="<?= url('home') ?>" class="d-block">Olá <?= $_SESSION['user']['name'] ?? '' ?>, seja bem vindo(a)</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Catálogo</li>
            <li class="nav-item">
                <a href="<?= url('categories')?>" class="nav-link">
                    <i class="fa fa-align-center nav-icon"></i>
                    <p>Categorias</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('sub-categories')?>" class="nav-link">
                    <i class="fa fa-align-center nav-icon"></i>
                    <p>Sub-categorias</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('glossary')?>" class="nav-link">
                    <i class="fa fa-file nav-icon"></i>
                    <p>Glossário</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('formula')?>" class="nav-link">
                    <i class="fab fa-affiliatetheme nav-icon"></i>
                    <p>Fórmulas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('vehicles')?>" class="nav-link">
                    <i class="nav-icon fas fa-ellipsis-h"></i>
                    <p>Veículos</p>
                </a>
            </li>
            <li class="nav-header">Institucional</li>
            <li class="nav-item">
                <a href="<?= url('institutional')?>" class="nav-link">
                    <i class="fa fa-file-archive nav-icon"></i>
                    <p>Listar Institucional</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('partners')?>" class="nav-link">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Parceiros</p>
                </a>
            </li>
            <li class="nav-header">Configurações</li>
            <li class="nav-item">
                <a href="<?= url('impression-history')?>" class="nav-link">
                    <i class="fa fa-file-archive nav-icon"></i>
                    <p>Histórico de Impressões</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('users')?>" class="nav-link">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Usuários</p>
                </a>
            </li>
            <li class="nav-header">Médicos</li>
            <li class="nav-item">
                <a href="<?= url('doctors')?>" class="nav-link">
                    <i class="fa fa-user-nurse nav-icon"></i>
                    <p>Cadastrados</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= url('doctors-segment')?>" class="nav-link">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Por área atuação</p>
                </a>
            </li>
            <!--<li class="nav-item">
                <a href="<?= url('admin/general_data')?>" class="nav-link">
                    <i class="fa fa-cogs nav-icon"></i>
                    <p>Dados Gerais</p>
                </a>
            </li>-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>


<script>
    $('.clear_search').click(function (e) {
        e.preventDefault();
       $('.search').val("");
       $('#formSearch').submit();
    });
</script>


