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
        echo self::getTwig()->render(
            'Association/liste.html',
            [
                'associations' => $associations,
                'conducteurs'   => $conducteurs,
                'vehicules' => $vehicules
            ]
        );
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

    public static function delete(int $id)
    {
        Association_vehicule_conducteur::delete($id);
        self::list();
    }

    public static function edit(int $id)
    {
        $association = Association_vehicule_conducteur::findOne($id);
        $conducteurs = Conducteur::findAll();
        $vehicules = Vehicule::findAll();
         echo self::getTwig()->render(
            'Association/edit.html',
            [
                    'associationId' => $association['id_association'],
                    'conducteurs'   => $conducteurs,
                    'vehicules' => $vehicules
            ]
        );
    }
    public static function update()
    {
        $id = $_POST['id'];
        $id_vehicule = $_POST['id_vehicule'];
        $id_conducteur = $_POST['id_conducteur'];
        Association_vehicule_conducteur::upDate($id, $id_vehicule, $id_conducteur);
        self::list();
    }

}
