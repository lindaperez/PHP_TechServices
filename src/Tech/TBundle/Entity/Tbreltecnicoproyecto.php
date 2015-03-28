<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbreltecnicoproyecto
 *
 * @ORM\Table(name="tbrelTecnicoProyecto", indexes={@ORM\Index(name="fk_tbrelTecnicoProyecto_1", columns={"fk_iID_tbdetTecnico"}), @ORM\Index(name="fk_tbrelTecnicoCotizacion_2", columns={"fk_iID_tbdetCotizacion"})})
 * @ORM\Entity
 */
class Tbreltecnicoproyecto
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
     * @var \DateTime
     *
     * @ORM\Column(name="dfecha", type="datetime", nullable=false)
     */
    private $dfecha;

    /**
     * @var string
     *
     * @ORM\Column(name="vdescripcionCambioEst", type="string", length=200, nullable=false)
     */
    private $vdescripcioncambioest;

    /**
     * @var \Tech\TBundle\Entity\Tbdetcotizacion
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetcotizacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetCotizacion", referencedColumnName="id")
     * })
     */
    private $fkIidTbdetcotizacion;

    /**
     * @var \Tech\TBundle\Entity\Tbdettecnico
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdettecnico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetTecnico", referencedColumnName="id")
     * })
     */
    private $fkIidTbdettecnico;



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
     * Set dfecha
     *
     * @param \DateTime $dfecha
     * @return Tbreltecnicoproyecto
     */
    public function setDfecha($dfecha)
    {
        $this->dfecha = $dfecha;

        return $this;
    }

    /**
     * Get dfecha
     *
     * @return \DateTime 
     */
    public function getDfecha()
    {
        return $this->dfecha;
    }

    /**
     * Set vdescripcioncambioest
     *
     * @param string $vdescripcioncambioest
     * @return Tbreltecnicoproyecto
     */
    public function setVdescripcioncambioest($vdescripcioncambioest)
    {
        $this->vdescripcioncambioest = $vdescripcioncambioest;

        return $this;
    }

    /**
     * Get vdescripcioncambioest
     *
     * @return string 
     */
    public function getVdescripcioncambioest()
    {
        return $this->vdescripcioncambioest;
    }

    /**
     * Set fkIidTbdetcotizacion
     *
     * @param \Tech\TBundle\Entity\Tbdetcotizacion $fkIidTbdetcotizacion
     * @return Tbreltecnicoproyecto
     */
    public function setFkIidTbdetcotizacion(\Tech\TBundle\Entity\Tbdetcotizacion $fkIidTbdetcotizacion = null)
    {
        $this->fkIidTbdetcotizacion = $fkIidTbdetcotizacion;

        return $this;
    }

    /**
     * Get fkIidTbdetcotizacion
     *
     * @return \Tech\TBundle\Entity\Tbdetcotizacion 
     */
    public function getFkIidTbdetcotizacion()
    {
        return $this->fkIidTbdetcotizacion;
    }

    /**
     * Set fkIidTbdettecnico
     *
     * @param \Tech\TBundle\Entity\Tbdettecnico $fkIidTbdettecnico
     * @return Tbreltecnicoproyecto
     */
    public function setFkIidTbdettecnico(\Tech\TBundle\Entity\Tbdettecnico $fkIidTbdettecnico = null)
    {
        $this->fkIidTbdettecnico = $fkIidTbdettecnico;

        return $this;
    }

    /**
     * Get fkIidTbdettecnico
     *
     * @return \Tech\TBundle\Entity\Tbdettecnico 
     */
    public function getFkIidTbdettecnico()
    {
        return $this->fkIidTbdettecnico;
    }
    
 
}
