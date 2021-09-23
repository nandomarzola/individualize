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

define('ROOT', urlSotoreGlobal()."/projetos/individualize/admin");
define('HOME', urlSotoreGlobal()."/projetos/individualize/admin/home");
define('LOGIN', urlSotoreGlobal()."/projetos/individualize/admin/login");

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
