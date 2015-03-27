<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetentrega
 *
 * @ORM\Table(name="tbdetEntrega", indexes={@ORM\Index(name="fk_tbdetEntrega_tbdetProyecto1", columns={"tbdetProyecto_id"}), @ORM\Index(name="fk_tbdetEntrega_tbdetTecnico1", columns={"tbdetTecnico_id"}), @ORM\Index(name="fk_tbdetEntrega_tbdetLiderPMO1", columns={"tbdetLiderPMO_id"})})
 * @ORM\Entity
 */
class Tbdetentrega
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
     * @var integer
     *
     * @ORM\Column(name="icantidadEntregada", type="integer", nullable=false)
     */
    private $icantidadentregada;

    /**
     * @var string
     *
     * @ORM\Column(name="vobservaciones", type="string", length=500, nullable=true)
     */
    private $vobservaciones;

    /**
     * @var \Tech\TBundle\Entity\Tbdetproyecto
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetproyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetProyecto_id", referencedColumnName="id")
     * })
     */
    private $tbdetproyecto;

    /**
     * @var \Tech\TBundle\Entity\Tbdettecnico
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdettecnico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetTecnico_id", referencedColumnName="id")
     * })
     */
    private $tbdettecnico;

    /**
     * @var \Tech\TBundle\Entity\Tbdetliderpmo
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetliderpmo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetLiderPMO_id", referencedColumnName="id")
     * })
     */
    private $tbdetliderpmo;



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
     * @return Tbdetentrega
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
     * Set icantidadentregada
     *
     * @param integer $icantidadentregada
     * @return Tbdetentrega
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
     * Set vobservaciones
     *
     * @param string $vobservaciones
     * @return Tbdetentrega
     */
    public function setVobservaciones($vobservaciones)
    {
        $this->vobservaciones = $vobservaciones;

        return $this;
    }

    /**
     * Get vobservaciones
     *
     * @return string 
     */
    public function getVobservaciones()
    {
        return $this->vobservaciones;
    }

    /**
     * Set tbdetproyecto
     *
     * @param \Tech\TBundle\Entity\Tbdetproyecto $tbdetproyecto
     * @return Tbdetentrega
     */
    public function setTbdetproyecto(\Tech\TBundle\Entity\Tbdetproyecto $tbdetproyecto = null)
    {
        $this->tbdetproyecto = $tbdetproyecto;

        return $this;
    }

    /**
     * Get tbdetproyecto
     *
     * @return \Tech\TBundle\Entity\Tbdetproyecto 
     */
    public function getTbdetproyecto()
    {
        return $this->tbdetproyecto;
    }

    /**
     * Set tbdettecnico
     *
     * @param \Tech\TBundle\Entity\Tbdettecnico $tbdettecnico
     * @return Tbdetentrega
     */
    public function setTbdettecnico(\Tech\TBundle\Entity\Tbdettecnico $tbdettecnico = null)
    {
        $this->tbdettecnico = $tbdettecnico;

        return $this;
    }

    /**
     * Get tbdettecnico
     *
     * @return \Tech\TBundle\Entity\Tbdettecnico 
     */
    public function getTbdettecnico()
    {
        return $this->tbdettecnico;
    }

    /**
     * Set tbdetliderpmo
     *
     * @param \Tech\TBundle\Entity\Tbdetliderpmo $tbdetliderpmo
     * @return Tbdetentrega
     */
    public function setTbdetliderpmo(\Tech\TBundle\Entity\Tbdetliderpmo $tbdetliderpmo = null)
    {
        $this->tbdetliderpmo = $tbdetliderpmo;

        return $this;
    }

    /**
     * Get tbdetliderpmo
     *
     * @return \Tech\TBundle\Entity\Tbdetliderpmo 
     */
    public function getTbdetliderpmo()
    {
        return $this->tbdetliderpmo;
    }
}
