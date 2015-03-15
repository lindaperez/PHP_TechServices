<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetproyecto
 *
 * @ORM\Table(name="tbdetProyecto", indexes={@ORM\Index(name="fk_tbdetProyecto_Cot", columns={"fk_iCodCotizacion"})})
 * @ORM\Entity
 */
class Tbdetproyecto
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
     * @ORM\Column(name="iCodProyecto", type="integer", nullable=false)
     */
    private $icodproyecto;

    /**
     * @var \Tech\TBundle\Entity\Tbdetcotizacion
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetcotizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iCodCotizacion", referencedColumnName="id")
     * })
     */
    private $fkIcodcotizacion;



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
     * Set icodproyecto
     *
     * @param integer $icodproyecto
     * @return Tbdetproyecto
     */
    public function setIcodproyecto($icodproyecto)
    {
        $this->icodproyecto = $icodproyecto;

        return $this;
    }

    /**
     * Get icodproyecto
     *
     * @return integer 
     */
    public function getIcodproyecto()
    {
        return $this->icodproyecto;
    }

    /**
     * Set fkIcodcotizacion
     *
     * @param \Tech\TBundle\Entity\Tbdetcotizacion $fkIcodcotizacion
     * @return Tbdetproyecto
     */
    public function setFkIcodcotizacion(\Tech\TBundle\Entity\Tbdetcotizacion $fkIcodcotizacion = null)
    {
        $this->fkIcodcotizacion = $fkIcodcotizacion;

        return $this;
    }

    /**
     * Get fkIcodcotizacion
     *
     * @return \Tech\TBundle\Entity\Tbdetcotizacion 
     */
    public function getFkIcodcotizacion()
    {
        return $this->fkIcodcotizacion;
    }
}
