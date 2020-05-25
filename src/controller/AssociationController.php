<?php

namespace App\Controller;

use App\Model\Association_vehicule_conducteur;
use App\Model\Conducteur;
use App\Model\Vehicule;

class AssociationController extends AbstractController
{

    public static function list()
    {
        $associations = Association_vehicule_conducteur::findAll();
        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();
        echo self::getTwig()->render('Association/liste.html', 
        [
            'associations' => $associations,
            'conducteurs'   => $conducteurs,
            'vehicules' => $vehicules
            ]);
    }

    public static function new()
    {
        $suite = true;
        $msg = "";
        if (empty($_POST['conducteur'])) {
            $msg = $msg . "Le conducteur n'est pas renseigné !" . "</br>";
            $conducteur = "";
            $suite = false;
        } else {
            $conducteur = $_POST['conducteur'];
        }
        if (empty($_POST['vehicule'])) {
            $msg = $msg . "Le véhicule n'est pas renseigné !" . "</br>";
            $vehicule = "";
            $suite = false;
        } else {
            $vehicule = $_POST['vehicule'];
        }
        if ($suite) {
            Association_vehicule_conducteur::store($vehicule, $conducteur);
        } else {
            echo $msg;
        }
        self::list();
    }



}
