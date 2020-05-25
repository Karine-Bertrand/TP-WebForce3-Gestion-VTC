<?php

namespace App\Model;

class Vehicule extends AbstractModel
{
    /************
     * attributs de la classe
     * noms identiques aux champs de la bdd
     */
    /**
     * @var int
     */
    private $id_vehicule;

    /**
     * @var string
     */
    private $marque;

    /**
     * @var string
     */
    private $modele;

    /**
     * @var string
     */
    private $couleur;

    /**
     * @var string
     */
    private $immatriculation;

    /************
     * fonctions getters
     */

    /**
     * @return integer
     */
    public function getId_vehicule(): int
    {
        return $this->id_vehicule;
    }

    /**
     * @return string
     */
    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * @return string
     */
    public function getModele(): string
    {
        return $this->modele;
    }

    /**
     * @return string
     */
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /**
     * @return string
     */
    public function getImmatriculation(): string
    {
        return $this->immatriculation;
    }


    /************
     * fonctions setters
     */

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
     * @param string $marque
     * @return self
     */
    public function setMarque(string $marque): self
    {
        $this->marque = $marque;
        return $this;
    }

    /**
     * @param string $modele
     * @return self
     */
    public function setModele(string $modele): self
    {
        $this->modele = $modele;
        return $this;
    }

    /**
     * @param string $couleur
     * @return self
     */
    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;
        return $this;
    }

    /**
     * @param string $immatriculation
     * @return self
     */
    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;
        return $this;
    }


    public static function findAll()
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Vehicule";
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

    public static function findOne($id)
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Vehicule WHERE id_vehicule=" . $id;
        $response = $bdd->prepare($query);
        $response->execute();
        $vehicule = $response->fetch();

        return $vehicule;
    }



    public static function toObject($array)
    {
        $vehicule = new Vehicule;
        $vehicule->setId_vehicule($array['id_vehicule']);
        $vehicule->setMarque($array['marque']);
        $vehicule->setModele($array['modele']);
        $vehicule->setCouleur($array['couleur']);
        $vehicule->setImmatriculation($array['immatriculation']);

        return $vehicule;
    }

    public static function store($marque, $modele, $couleur, $immatriculation){
        $bdd = self::getPdo();
        $request =  "INSERT INTO vehicule (marque, modele, couleur, immatriculation)
                     VALUES (:marque, :modele, :couleur, :immatriculation)";
        $response = $bdd->prepare($request);
        $response->execute([
            'marque'   =>  $marque,
            'modele'   =>  $modele,
            'couleur'   => $couleur,
            'immatriculation'   =>  $immatriculation
        ]);

    }

    public static function delete($id)
    {
        $bdd = self::getPdo();

        $request = "DELETE FROM vehicule WHERE id_vehicule=" . $id;
        $response = $bdd->prepare($request);
        $response->execute(['id' => $id]);
    }

    public static function upDate($id, $marque, $modele, $couleur, $immatriculation)
    {
        $bdd = self::getPdo();
        $request =  "UPDATE vehicule 
                SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation = :immatriculation
                WHERE id_vehicule = :id";
        $response = $bdd->prepare($request);
        $response->execute([
            'marque'   =>  $marque,
            'modele'   =>  $modele,
            'couleur'   =>  $couleur,
            'immatriculation'   => $immatriculation,
            'id'        => $id
        ]);
    }


}
