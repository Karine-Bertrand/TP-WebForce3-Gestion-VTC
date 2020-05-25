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

    public static function new()
    {
        $suite = true;
        $msg = "";
        if (empty($_POST['marque'])) {
            $msg = $msg . "La marque n'est pas renseignée !" . "</br>";
            $marque = "";
            $suite = false;
        } else {
            $marque = ucfirst($_POST['marque']);
        }
        if (empty($_POST['modele'])) {
            $msg = $msg . "Le modèle n'est pas renseigné !" . "</br>";
            $modele = "";
            $suite = false;
        } else {
            $modele = $_POST['modele'];
        }
        if (empty($_POST['immatriculation'])) {
            $msg = $msg . "L'immatriculation n'est pas renseignée !" . "</br>";
            $immatriculation = "";
            $suite = false;
        } else {
            $immatriculation = $_POST['immatriculation'];
        }

        if ($suite) {
            $couleur = $_POST['couleur'];
            Vehicule::store($marque, $modele, $couleur, $immatriculation);
        } else {
            echo $msg;
        }
        self::list();
    }

    public static function delete(int $id)
    {
        Vehicule::delete($id);
        self::list();
    }


    public static function edit(int $id)
    {
        $vehicule = Vehicule::findOne($id);
        echo self::getTwig()->render(
            'Vehicule/edit.html',
            [
                'vehiculeId'      =>  $vehicule['id_vehicule'],
                'vehiculeMarque' =>  $vehicule['marque'],
                'vehiculeModele' =>  $vehicule['modele'],
                'vehiculeCouleur' =>  $vehicule['couleur'],
                'vehiculeImmatriculation' =>  $vehicule['immatriculation']
            ]
        );
    }
    public static function update()
    {
        $id = $_POST['id'];
        $marque = $_POST['marque'];
        $modele = $_POST['modele'];
        $couleur = $_POST['couleur'];
        $immatriculation = $_POST['immatriculation'];
        Vehicule::upDate($id, $marque, $modele, $couleur, $immatriculation);
        self::list();
    }




}
