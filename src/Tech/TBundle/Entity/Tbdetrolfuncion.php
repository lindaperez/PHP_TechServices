<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetrolfuncion
 *
 * @ORM\Table(name="tbdetRolFuncion", indexes={@ORM\Index(name="ID_ROL_idx", columns={"fk_iID_ROL"}), @ORM\Index(name="ID_FUNCION_idx", columns={"fk_iID_FUNCION"})})
 * @ORM\Entity
 */
class Tbdetrolfuncion
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
     * @var \Tech\TBundle\Entity\Tbgenrol
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenrol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ROL", referencedColumnName="pk_iID_ROL")
     * })
     */
    private $fkIidRol;

    /**
     * @var \Tech\TBundle\Entity\Tbgenfuncion
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenfuncion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_FUNCION", referencedColumnName="pk_iID_FUNCION")
     * })
     */
    private $fkIidFuncion;



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
     * Set fkIidRol
     *
     * @param \Tech\TBundle\Entity\Tbgenrol $fkIidRol
     * @return Tbdetrolfuncion
     */
    public function setFkIidRol(\Tech\TBundle\Entity\Tbgenrol $fkIidRol = null)
    {
        $this->fkIidRol = $fkIidRol;

        return $this;
    }

    /**
     * Get fkIidRol
     *
     * @return \Tech\TBundle\Entity\Tbgenrol 
     */
    public function getFkIidRol()
    {
        return $this->fkIidRol;
    }

    /**
     * Set fkIidFuncion
     *
     * @param \Tech\TBundle\Entity\Tbgenfuncion $fkIidFuncion
     * @return Tbdetrolfuncion
     */
    public function setFkIidFuncion(\Tech\TBundle\Entity\Tbgenfuncion $fkIidFuncion = null)
    {
        $this->fkIidFuncion = $fkIidFuncion;

        return $this;
    }

    /**
     * Get fkIidFuncion
     *
     * @return \Tech\TBundle\Entity\Tbgenfuncion 
     */
    public function getFkIidFuncion()
    {
        return $this->fkIidFuncion;
    }
}
