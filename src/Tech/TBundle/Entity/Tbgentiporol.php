<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgentiporol
 *
 * @ORM\Table(name="tbgenTipoRol", uniqueConstraints={@ORM\UniqueConstraint(name="pk_TIPO_ROL_UNIQUE", columns={"pk_TIPO_ROL"})})
 * @ORM\Entity
 */
class Tbgentiporol
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
     * @var integer
     *
     * @ORM\Column(name="pk_TIPO_ROL", type="integer", nullable=false)
     */
    private $pkTipoRol;

    /**
     * @var string
     *
     * @ORM\Column(name="vDESCRIPCION", type="string", length=45, nullable=false)
     */
    private $vdescripcion;



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
     * Set pkTipoRol
     *
     * @param integer $pkTipoRol
     * @return Tbgentiporol
     */
    public function setPkTipoRol($pkTipoRol)
    {
        $this->pkTipoRol = $pkTipoRol;

        return $this;
    }

    /**
     * Get pkTipoRol
     *
     * @return integer 
     */
    public function getPkTipoRol()
    {
        return $this->pkTipoRol;
    }

    /**
     * Set vdescripcion
     *
     * @param string $vdescripcion
     * @return Tbgentiporol
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

    public function __toString()
    {
        return $this->vdescripcion;
    }


}
