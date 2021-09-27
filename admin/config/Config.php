<?php


function urlSotoreGlobal(){

   
    $protocolo = 'https://';
    
    return $protocolo.$_SERVER['HTTP_HOST'];

}

define('ROOT', urlSotoreGlobal()."/novo/individualize/admin");
define('HOME', urlSotoreGlobal()."/novo/individualize/home");
define('LOGIN', urlSotoreGlobal()."/novo/individualize/login");

define("SITE", "Admin Endividualize");

/**
 * @param string|null $uri
 * @return string
 */
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }

    return ROOT;
}
