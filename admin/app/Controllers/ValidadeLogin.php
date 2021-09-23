<?php
namespace App\Controllers;

class ValidadeLogin
{
    public function existAdmin()
    {
        if(!isset($_SESSION['user']) && !$_SESSION['user']['admin']){
            return redirect(ROOT);
        }

    }

}