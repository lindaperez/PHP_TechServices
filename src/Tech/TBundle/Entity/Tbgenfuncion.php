<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenfuncion
 *
 * @ORM\Table(name="tbgenFuncion", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iID_FUNCION_UNIQUE", columns={"pk_iID_FUNCION"})})
 * @ORM\Entity
 */
class Tbgenfuncion
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
     * @ORM\Column(name="pk_iID_FUNCION", type="integer", nullable=false)
     */
    private $pkIidFuncion;

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
     * Set pkIidFuncion
     *
     * @param integer $pkIidFuncion
     * @return Tbgenfuncion
     */
    public function setPkIidFuncion($pkIidFuncion)
    {
        $this->pkIidFuncion = $pkIidFuncion;

        return $this;
    }

    /**
     * Get pkIidFuncion
     *
     * @return integer 
     */
    public function getPkIidFuncion()
    {
        return $this->pkIidFuncion;
    }

    /**
     * Set vdescripcion
     *
     * @param string $vdescripcion
     * @return Tbgenfuncion
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
}
