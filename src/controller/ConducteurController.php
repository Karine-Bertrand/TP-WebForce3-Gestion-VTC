<?php

namespace App\Controller;

use App\Model\Conducteur;

class ConducteurController extends AbstractController
{

    public static function list()
    {
        $conducteurs = Conducteur::findAll();
        echo self::getTwig()->render('Conducteur/liste.html', ['conducteurs' => $conducteurs]);
    }
}

