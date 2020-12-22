<?php


namespace locvoitBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use locvoitBundle\Entity\Location;

/**
 * @ORM\Entity
 */


class Client
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Location")
     */
private $id;
        /**
         * @ORM\Column(type="string",length=255)
         */
private $Nom;
    /**
     * @ORM\Column(type="string",length=255)
     */
private $Prenom;
    /**
     * @ORM\Column(type="string",length=255)
     */
public $date_naissance;
    /**
     * @ORM\Column(type="integer")
     */
private $TEl;
    /**
     * @ORM\Column(type="string",length=255)
     */
public $date_permis;

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return mixed
     */
    public function getTEl()
    {
        return $this->TEl;
    }

    /**
     * @param mixed $TEl
     */
    public function setTEl($TEl)
    {
        $this->TEl = $TEl;
    }

    /**
     * @return mixed
     */
    public function getDatePermis()
    {
        return $this->date_permis;
    }

    /**
     * @param mixed $date_permis
     */
    public function setDatePermis($date_permis)
    {
        $this->date_permis = $date_permis;
    }
    public function __toString()
    {
        return (string) $this->getId();
    }

}