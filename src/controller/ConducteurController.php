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


    public static function new()
    {
        $suite = true;
        $msg = "";
        if (empty($_POST['nom'])) {
            $msg = $msg . "Le nom n'est pas renseigné !" . "</br>";
            $nom = "";
            $suite = false;
        } else {
            $nom = ucfirst($_POST['nom']);
        }
        if (empty($_POST['prenom'])) {
            $msg = $msg . "Le prénom n'est pas renseigné !" . "</br>";
            $prenom = "";
            $suite = false;
        } else {
            $prenom = ucfirst($_POST['prenom']);
        }
        if ($suite) {
            Conducteur::store($prenom, $nom);
        } else {
            echo $msg;
        }
        self::list();
    }

    public static function delete(int $id)
    {
        Conducteur::delete($id);
        self::list();
    }


    public static function edit(int $id)
    {
        $conducteur = Conducteur::findOne($id);
        echo self::getTwig()->render(
            'Conducteur/edit.html',
            [
                'conducteurId'      =>  $conducteur['id_conducteur'],
                'conducteurPrenom' =>  $conducteur['prenom'],
                'conducteurNom' =>  $conducteur['nom'],
            ]
        );
    }
    public static function update()
    {
        $id = $_POST['id'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        Conducteur::upDate($id, $prenom, $nom);
        self::list();
    }


}

