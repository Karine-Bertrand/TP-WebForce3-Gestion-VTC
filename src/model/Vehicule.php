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
        return $this->marque;
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
        $this->marque = $modele;
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
}
