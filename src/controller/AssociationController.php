<?php

namespace App\Controller;

use App\Model\Association_vehicule_conducteur;

class AssociationController extends AbstractController
{

    public static function list()
    {
        $associations = Association_vehicule_conducteur::findAll();
        echo self::getTwig()->render('Association/liste.html', ['associations' => $associations]);
    }
}
