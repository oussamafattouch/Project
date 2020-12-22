<?php


namespace locvoitBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Manager
 * @ORM\Entity
 */

class Manager
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
private $idm;
    /**
     * @ORM\Column(type="string",length=255)
     */
private $Nom;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $Prenom;

    /**
     * @return mixed
     */
    public function getIdm()
    {
        return $this->idm;
    }

    /**
     * @param mixed $idm
     */
    public function setIdm($idm)
    {
        $this->idm = $idm;
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

}