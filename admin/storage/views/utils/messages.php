<style>
    /* The alert message box */

    .me-error{
        background-color: #f44336; /* Red */
    }

    .me-success{
        background-color: #72e61b;
    }

    .me-warning{
        background-color: #fd7e14;
    }

    .me-info{
        background-color: #488cd4;
    }

    .me-alert{
        position: absolute;
        z-index: 9999;
        right: 0;
        width: 30%;
    }

    .alert {
        padding: 20px;
        color: white;
        margin-bottom: 15px;
        margin: 20px;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        font-style: italic;
    }

    /* The close button */
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    /* When moving the mouse over the close button */
    .closebtn:hover {
        color: black;
    }
</style>

<?php

$msg = !empty($_SESSION['message']) ? strtoupper($_SESSION['message']) : '';

$v->start('script');
if(isset($_SESSION['message'])){

    switch ($_SESSION['type']){
        case 'success';
            echo "<script>toastr.success('$msg')</script>";
            break;
        case 'error';
            echo "<script>toastr.error('$msg')</script>";
            break;
        case 'warning';
            echo "<script>toastr.warning('$msg')</script>";
            break;
    }

}
$v->stop();


?>

<?php
    unset($_SESSION["message"]);
    unset($_SESSION["type"]);
?>

<script>
    $(function(){
        setTimeout(function(){ $('.me-alert').fadeOut(500); }, 1500);
    });
</script>
