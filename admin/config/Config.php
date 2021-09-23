<?php


function urlSotoreGlobal(){

    if(strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') === false)
    {
        $protocolo = 'http://';
    }
    else
    {
        $protocolo = 'https://';
    }

    return $protocolo.$_SERVER['HTTP_HOST'];

}

define('ROOT', urlSotoreGlobal()."/novo/admin");
define('HOME', urlSotoreGlobal()."/novo/home");
define('LOGIN', urlSotoreGlobal()."/novo/login");

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
