<?php


namespace locvoitBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use locvoitBundle\Entity\Client;
/**
 * @ORM\Entity
 */


class Location
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
private $idl;

    /**
     * @return mixed
     */
    public function getIdl()
    {
        return $this->idl;
    }

    /**
     * @param mixed $idl
     */
    public function setIdl($idl)
    {
        $this->idl = $idl;
    }

    /**
     * @return mixed
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * @param mixed $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;
    }

    /**
     * @return mixed
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * @param mixed $datefin
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;
    }

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
     * Get mat
     * @return mixed
     */
    public function getMat()
    {
        return $this->mat;
    }

    /**
     * @param mixed $mat
     */
    public function setMat($mat)
    {
        $this->mat = $mat;
    }
    /**
     * @ORM\Column(type="string",length=255)
     */
private $duree;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $datedebut;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $datefin;
    /**
     * @ORM\ManyToOne(targetEntity="Client", cascade={"persist"})
     * @ORM\JoinColumn(name="idclient", referencedColumnName="id",onDelete="Cascade")
     */
    public $id;
    /**
     * @ORM\ManyToOne(targetEntity="Voiture", cascade={"persist"})
     * @ORM\JoinColumn(name="Voiture", referencedColumnName="mat",onDelete="Cascade")
     */
    public $mat;


}