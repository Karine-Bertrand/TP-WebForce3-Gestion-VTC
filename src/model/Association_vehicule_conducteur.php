<?php

namespace App\Model;

class Association_vehicule_conducteur extends AbstractModel
{
    /************
     * attributs de la classe
     * noms identiques aux champs de la bdd
     */

    /**
     * @var int
     */
    private $id_association;
    /**
     * @var int
     */
    private $id_vehicule;
    /**
     * @var int
     */
    private $id_conducteur;

    /************
     * fonctions getters
     */

    /**
     * @return integer
     */
    public function getId_association(): int
    {
        return $this->id_association;
    }

    /**
     * @return integer
     */
    public function getId_vehicule(): int
    {
        return $this->id_vehicule;
    }

    /**
     * @return integer
     */
    public function getId_conducteur(): int
    {
        return $this->id_conducteur;
    }

    /************
     * fonctions setters
     */

    /**
     * @param integer $id_association
     * @return self
     */
    public function setId_association(int $id_association): self
    {
        $this->id_association = $id_association;
        return $this;
    }

    /**
     * @param integer $id_vehicule
     * @return self
     */
    public function setId_vehicule(int $id_vehicule): self
    {
        $this->id_vehicule = $id_vehicule;
        return $this;
    }

    /**
     * @param integer $id_conducteur
     * @return self
     */
    public function setId_conducteur(int $id_conducteur): self
    {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

    public static function findAll()
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Association_vehicule_conducteur";
        $response = $bdd->prepare($query);
        $response->execute();
        $data = $response->fetchAll();

        // On prépare le tableau qui contiendra nos animaux en format Object
        $dataAsObjects = [];

        // On fait un foreach de $data (données de la bdd) pour transformer chaque data en un object
        // puis on met l'object dans le tableau $dataAsObjects
        foreach ($data as $d) {
            $dataAsObjects[] = self::toObject($d);
        }
        return $dataAsObjects;
    }

    public static function toObject($array)
    {
        $association = new Association_vehicule_conducteur;
        $association->setId_association($array['id_association']);
        $association->setId_vehicule($array['id_vehicule']);
        $association->setId_conducteur($array['id_conducteur']);

        return $association;
    }

}
