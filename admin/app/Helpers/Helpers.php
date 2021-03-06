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

function apiConsultaM√©dicos($state, $serial, $tipo){

    $url = "https://www.consultacrm.com.br/api/index.php?tipo=$tipo&uf=$state&q=$serial&chave=1131329113&destino=json";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
    $return = curl_exec($curl);
    curl_close($curl);

    return json_decode($return, true);
}




