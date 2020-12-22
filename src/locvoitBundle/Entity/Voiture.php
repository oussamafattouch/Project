<?php


namespace locvoitBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */

class Voiture
{
    /**
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Location")
     */
    private $mat;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $disponiblite;
    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * Get mat
     * @return integer
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
     * @return mixed
     */
    public function getDisponiblite()
    {
        return $this->disponiblite;
    }

    /**
     * @param mixed $disponiblite
     */
    public function setDisponiblite($disponiblite)
    {
        $this->disponiblite = $disponiblite;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    /**
     * Transform to string
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getMat();
    }


}