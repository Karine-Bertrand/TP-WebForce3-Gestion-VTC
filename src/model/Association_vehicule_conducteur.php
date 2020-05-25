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

    /**
     * attributs complémentaires pour affichage seulement
     * on reprend les noms des champs des tables conducteur et vehicule
     */
    /**
     * concatenation nom + prenom du condcuteur de l'id_conducteur
     *
     * @var string
     */
    private $conducteur;

    /**
     * concatenation marque + modele de l'id_vehicule
     *
     * @var string
     */
    private $vehicule;

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

    public function getConducteur(): string
    {
        return $this->conducteur;
    }

    public function getVehicule(): string
    {
        return $this->vehicule;
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

    /**
     * @param string $conducteur
     * @return self
     */
    public function setConducteur(string $conducteur): self
    {
        $this->conducteur = $conducteur;
        return $this;
    }

    /**
     * @param string $vehicule
     * @return self
     */
    public function setVehicule(string $vehicule): self
    {
        $this->vehicule = $vehicule;
        return $this;
    }

    /**
     * @return tableau
     */
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

    /**
     * @param int $vehicule
     * @param int $conducteur
     */
    public static function store($vehicule, $conducteur)
    {
        $bdd = self::getPdo();
        $request =  "INSERT INTO association_vehicule_conducteur (id_vehicule, id_conducteur)
                     VALUES (:vehicule, :conducteur)";
        $response = $bdd->prepare($request);
        $response->execute([
            'vehicule'   =>  $vehicule,
            'conducteur'   =>  $conducteur,
        ]);
    }

    /**
     * @param int $id
     */
    public static function delete($id)
    {
        $bdd = self::getPdo();
        $request = "DELETE FROM association_vehicule_conducteur WHERE id_association=" . $id;
        $response = $bdd->prepare($request);
        $response->execute(['id' => $id]);
    }
    /**
     * trouve la fiche association à partir de l'id
     *
     * @param int $id
     * @return tableau
     */
    public static function findOne($id)
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM association_vehicule_conducteur WHERE id_association=" . $id;
        $response = $bdd->prepare($query);
        $response->execute();
        $association = $response->fetch();

        return $association;
    }


    /**
     * trouve le conducteur associé à la fiche association
     *
     * @param int $id
     * @return tableau
     */
    public static function findOneConducteur($id) // à partir de l'id condcuteur
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Association_vehicule_conducteur WHERE id_conducteur=" . $id;
        $response = $bdd->prepare($query);
        $response->execute();
        $data = $response->fetchAll();
        $dataAsObjects = [];
        foreach ($data as $d) {
            $dataAsObjects[] = self::toObject($d);
        }
        return $dataAsObjects;
    }

    /**
     * trouve le cehicule associé à la fiche association
     *
     * @param int $id
     * @return tableau
     */
    public static function findOneVehicule($id) // à partir de l'id vehicule
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Association_vehicule_conducteur WHERE id_vehicule=" . $id;
        $response = $bdd->prepare($query);
        $response->execute();
        $data = $response->fetchAll();
        $dataAsObjects = [];
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

        /** recherche des infos du conducteur à partir de l'id */
        $conducteur = Conducteur::findOne($array['id_conducteur']);
        $association->setConducteur($conducteur['prenom'] . " " . $conducteur['nom']);

        /** recherche des infos du vehicule à partir de l'id */
        $vehicule = Vehicule::findOne($array['id_vehicule']);
        $association->setVehicule($vehicule['marque'] . " " . $vehicule['modele']);

        return $association;
    }


    public static function upDate($id, $id_vehicule, $id_conducteur)
    {
        $bdd = self::getPdo();
        $request =  "UPDATE Association_vehicule_conducteur 
                SET id_vehicule = :id_vehicule, id_conducteur = :id_conducteur
                WHERE id_association = :id";
        $response = $bdd->prepare($request);
        $response->execute([
            'id_vehicule'   =>  $id_vehicule,
            'id_conducteur'   =>  $id_conducteur,
            'id'        => $id
        ]);
    }
}
