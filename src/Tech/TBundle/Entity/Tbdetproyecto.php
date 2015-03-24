<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetproyecto
 *
 * @ORM\Table(name="tbdetProyecto", indexes={@ORM\Index(name="fk_tbdetProyecto_tbdetEstatusProyecto1", columns={"fk_tbdetEstatusProyecto_id"}), @ORM\Index(name="fk_tbdetProyecto_Cot", columns={"fk_iCodCotizacion"})})
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
     * @var string
     *
     * @ORM\Column(name="iCodProyecto", type="string", length=8, nullable=false)
     */
    private $icodproyecto;

    /**
     * @var integer
     *
     * @ORM\Column(name="fk_iCodCotizacion", type="integer", nullable=true)
     */
    private $fkIcodcotizacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="icantidad", type="integer", nullable=false)
     */
    private $icantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="icantidadEntregada", type="integer", nullable=false)
     */
    private $icantidadentregada;

    /**
     * @var \Tech\TBundle\Entity\Tbdetestatusproyecto
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetestatusproyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_tbdetEstatusProyecto_id", referencedColumnName="id")
     * })
     */
    private $fkTbdetestatusproyecto;



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
     * @param string $icodproyecto
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
     * @return string 
     */
    public function getIcodproyecto()
    {
        return $this->icodproyecto;
    }

    /**
     * Set fkIcodcotizacion
     *
     * @param integer $fkIcodcotizacion
     * @return Tbdetproyecto
     */
    public function setFkIcodcotizacion($fkIcodcotizacion)
    {
        $this->fkIcodcotizacion = $fkIcodcotizacion;

        return $this;
    }

    /**
     * Get fkIcodcotizacion
     *
     * @return integer 
     */
    public function getFkIcodcotizacion()
    {
        return $this->fkIcodcotizacion;
    }

    /**
     * Set icantidad
     *
     * @param integer $icantidad
     * @return Tbdetproyecto
     */
    public function setIcantidad($icantidad)
    {
        $this->icantidad = $icantidad;

        return $this;
    }

    /**
     * Get icantidad
     *
     * @return integer 
     */
    public function getIcantidad()
    {
        return $this->icantidad;
    }

    /**
     * Set icantidadentregada
     *
     * @param integer $icantidadentregada
     * @return Tbdetproyecto
     */
    public function setIcantidadentregada($icantidadentregada)
    {
        $this->icantidadentregada = $icantidadentregada;

        return $this;
    }

    /**
     * Get icantidadentregada
     *
     * @return integer 
     */
    public function getIcantidadentregada()
    {
        return $this->icantidadentregada;
    }

    /**
     * Set fkTbdetestatusproyecto
     *
     * @param \Tech\TBundle\Entity\Tbdetestatusproyecto $fkTbdetestatusproyecto
     * @return Tbdetproyecto
     */
    public function setFkTbdetestatusproyecto(\Tech\TBundle\Entity\Tbdetestatusproyecto $fkTbdetestatusproyecto = null)
    {
        $this->fkTbdetestatusproyecto = $fkTbdetestatusproyecto;

        return $this;
    }

    /**
     * Get fkTbdetestatusproyecto
     *
     * @return \Tech\TBundle\Entity\Tbdetestatusproyecto 
     */
    public function getFkTbdetestatusproyecto()
    {
        return $this->fkTbdetestatusproyecto;
    }
}
