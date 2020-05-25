<?php

namespace App\Controller;

use App\Model\Vehicule;

class VehiculeController extends AbstractController
{

    public static function list()
    {
        $vehicules = Vehicule::findAll();
        echo self::getTwig()->render('Vehicule/liste.html', ['vehicules' => $vehicules]);
    }
}
