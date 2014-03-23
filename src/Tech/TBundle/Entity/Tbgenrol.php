<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenrol
 *
 * @ORM\Table(name="tbgenRol", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iID_ROL_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_iTIPO_ROL_idx", columns={"fk_iTIPO_ROL"})})
 * @ORM\Entity
 */
class Tbgenrol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="vDESCRIPCION", type="string", length=45, nullable=false)
     */
    private $vdescripcion;

    /**
     * @var \Tech\TBundle\Entity\Tbgentiporol
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgentiporol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iTIPO_ROL", referencedColumnName="id")
     * })
     */
    private $fkItipoRol;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set vdescripcion
     *
     * @param string $vdescripcion
     * @return Tbgenrol
     */
    public function setVdescripcion($vdescripcion)
    {
        $this->vdescripcion = $vdescripcion;

        return $this;
    }

    /**
     * Get vdescripcion
     *
     * @return string 
     */
    public function getVdescripcion()
    {
        return $this->vdescripcion;
    }

    /**
     * Set fkItipoRol
     *
     * @param \Tech\TBundle\Entity\Tbgentiporol $fkItipoRol
     * @return Tbgenrol
     */
    public function setFkItipoRol(\Tech\TBundle\Entity\Tbgentiporol $fkItipoRol = null)
    {
        $this->fkItipoRol = $fkItipoRol;

        return $this;
    }

    /**
     * Get fkItipoRol
     *
     * @return \Tech\TBundle\Entity\Tbgentiporol 
     */
    public function getFkItipoRol()
    {
        return $this->fkItipoRol;
    }
//to string method   
    public function __toString()
    {

    return $this->vdescripcion;

}


}
