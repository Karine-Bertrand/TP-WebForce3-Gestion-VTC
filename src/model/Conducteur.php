<?php

namespace App\Model;

class Conducteur extends AbstractModel
{

    /************
     * attributs de la classe
     * noms identiques aux champs de la bdd
     */

    /**
     * @var int
     */
    private $id_conducteur;
    /**
     * @var string
     */
    private $prenom;
    /**
     * @var string
     */
    private $nom;

    /************
     * fonctions getters
     */
    /**
     * @return integer
     */
    public function getId_conducteur(): int
    {
        return $this->id_conducteur;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }


    /************
     * fonctions setters
     */

    /**
     * @param int $id_conducteur
     * @return self
     */
    public function setId_conducteur(int $id_conducteur): self
    {
        $this->id_conducteur = $id_conducteur;
        return $this;
    }

    /**
     * @param string $prenom
     * @return self
     */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @param string $nom
     * @return self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }


    public static function findAll()
    {
        $bdd = self::getPdo();
        $query = "SELECT * FROM Conducteur";
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
        $query = "SELECT * FROM Conducteur WHERE id_conducteur=" . $id;
        $response = $bdd->prepare($query);
        $response->execute();
        $conducteur = $response->fetch();

        return $conducteur;
    }

    public static function toObject($array)
    {
        $conducteur = new Conducteur;
        $conducteur->setId_conducteur($array['id_conducteur']);
        $conducteur->setPrenom($array['prenom']);
        $conducteur->setNom($array['nom']);

        return $conducteur;
    }

    public static function store($prenom, $nom)
    {
        $bdd = self::getPdo();
        $request =  "INSERT INTO conducteur (prenom, nom)
                     VALUES (:prenom, :nom)";
        $response = $bdd->prepare($request);
        $response->execute([
            'prenom'   =>  $prenom,
            'nom'   =>  $nom,
        ]);
    }

    public static function delete($id)
    {
        $bdd = self::getPdo();

        $request = "DELETE FROM conducteur WHERE id_conducteur=" . $id;
        $response = $bdd->prepare($request);
        $response->execute(['id' => $id]);
    }


}
