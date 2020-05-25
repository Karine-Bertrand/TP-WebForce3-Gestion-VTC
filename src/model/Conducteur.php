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
}
