<?php

function dd($p = [])
{
    echo '<pre>';
    print_r($p);
    echo '</pre>';
    die();
}

function redirect($url)
{
    header('Location: ' . $url);
}

function getCurrentDate($format = 'Y-m-d H:i:s')
{
    date_default_timezone_set('America/Sao_Paulo');
    return date($format);
}

function convertDate($date, string $format = "d/m/Y H:i:s")
{
    return date($format, strtotime($date));
}

/*function setLog($user, $action)
{
    $log = new \App\Models\Admin\Log();

    return $log->add($user, $action);
}*/

function flashMessages($type, $message)
{
    session_start();
    $_SESSION['type'] = $type;
    $_SESSION['message'] = $message;

}

function limit_caracter($texto, $limite, $quebra = true){

    $tamanho = strlen($texto);
    if($tamanho <= $limite){
        $novo_texto = $texto;
    }else{
        if($quebra == true){
            $novo_texto = trim(substr($texto, 0, $limite))."...";
        }else{
            $ultimo_espaco = strrpos(substr($texto, 0, $limite), " ");
            $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."...";
        }
    }

    return $novo_texto;
}


function convertDateString(string $date){

    $convert = strtotime($date);

    return date ('d/m/Y ' , $convert);

}




