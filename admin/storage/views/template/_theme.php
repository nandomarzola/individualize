<!doctype html>
<html lang="pt-br">

<head>
    <meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/fontawesome-free/css/all.min.css') ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/jqvmap/jqvmap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= url('assets/admin/plugins/summernote/summernote-bs4.css') ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style type="text/css">/* Chart.js */
        @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
    </style>
    <script src="<?= url('assets/js/jquery.js')?>"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <?= $v->insert('../utils/messages.php') ?>
    <style>
        .btn-app:hover {
            background: #f8f9fa;
            border-color: #aaaaaa;
            color: #444;
        }

        .paginator {
            list-style: none;
            padding: 0;
            float: right;
        }

        .paginator_item {
            display: inline-block;
            padding: 4px 12px;
            background: #17a2b8;
            color: #fff;
            text-decoration: none;
        }

        .paginator_item:hover {
            background: #70ddef;
        }

        .paginator_active,
        .paginator_active:hover {
            background: #0a373e;
        }
    </style>
    <?= $v->section("content"); ?>
</div>

<script src="<?= url('assets/admin/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= url('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/sparklines/sparkline.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<script src="<?= url('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<script src="<?= url('assets/admin/js/adminlte.js') ?>"></script>
<script src="<?= url('assets/admin/js/pages/dashboard.js') ?>"></script>
<script src="<?= url('assets/admin/js/demo.js') ?>"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
<script src="<?= url('assets/admin/js/custom.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?= $v->section("script"); ?>
<?= $v->section("sweetalert"); ?>

<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

</body>
</html>