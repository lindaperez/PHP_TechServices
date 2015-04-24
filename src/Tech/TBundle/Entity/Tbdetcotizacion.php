<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetcotizacion
 *
 * @ORM\Table(name="tbdetCotizacion", indexes={@ORM\Index(name="fk_tbdetCotizacion_Cont", columns={"tbdetCotizacioncol"}), @ORM\Index(name="fk_tbdetCotizacion_1", columns={"fk_iID_EstatusInstalacion"}), @ORM\Index(name="fk_tbdetCotizacion_tbdetLiderPMO1", columns={"tbdetLiderPMO_id"})})
 * @ORM\Entity
 */
class Tbdetcotizacion
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
     * @ORM\Column(name="codCotizacion", type="string", length=20, nullable=false)
     */
    private $codcotizacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dfecha", type="datetime", nullable=false)
     */
    private $dfecha;

    /**
     * @var \Tech\TBundle\Entity\Tbdetestatusinstalacion
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetestatusinstalacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_EstatusInstalacion", referencedColumnName="id")
     * })
     */
    private $fkIidEstatusinstalacion;

    /**
     * @var \Tech\TBundle\Entity\Tbdetcontratorif
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetcontratorif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetCotizacioncol", referencedColumnName="id")
     * })
     */
    private $tbdetcotizacioncol;

    /**
     * @var \Tech\TBundle\Entity\Tbdetliderpmo
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetliderpmo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetLiderPMO_id", referencedColumnName="id")
     * })
     */
    private $tbdetliderpmo;

    

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
     * Set codcotizacion
     *
     * @param string $codcotizacion
     * @return Tbdetcotizacion
     */
    public function setCodcotizacion($codcotizacion)
    {
        $this->codcotizacion = $codcotizacion;

        return $this;
    }

    /**
     * Get codcotizacion
     *
     * @return string 
     */
    public function getCodcotizacion()
    {
        return $this->codcotizacion;
    }

    /**
     * Set dfecha
     *
     * @param \DateTime $dfecha
     * @return Tbdetcotizacion
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
     * Set fkIidEstatusinstalacion
     *
     * @param \Tech\TBundle\Entity\Tbdetestatusinstalacion $fkIidEstatusinstalacion
     * @return Tbdetcotizacion
     */
    public function setFkIidEstatusinstalacion(\Tech\TBundle\Entity\Tbdetestatusinstalacion $fkIidEstatusinstalacion = null)
    {
        $this->fkIidEstatusinstalacion = $fkIidEstatusinstalacion;

        return $this;
    }

    /**
     * Get fkIidEstatusinstalacion
     *
     * @return \Tech\TBundle\Entity\Tbdetestatusinstalacion 
     */
    public function getFkIidEstatusinstalacion()
    {
        return $this->fkIidEstatusinstalacion;
    }

    /**
     * Set tbdetcotizacioncol
     *
     * @param \Tech\TBundle\Entity\Tbdetcontratorif $tbdetcotizacioncol
     * @return Tbdetcotizacion
     */
    public function setTbdetcotizacioncol(\Tech\TBundle\Entity\Tbdetcontratorif $tbdetcotizacioncol = null)
    {
        $this->tbdetcotizacioncol = $tbdetcotizacioncol;

        return $this;
    }

    /**
     * Get tbdetcotizacioncol
     *
     * @return \Tech\TBundle\Entity\Tbdetcontratorif 
     */
    public function getTbdetcotizacioncol()
    {
        return $this->tbdetcotizacioncol;
    }

    /**
     * Set tbdetliderpmo
     *
     * @param \Tech\TBundle\Entity\Tbdetliderpmo $tbdetliderpmo
     * @return Tbdetcotizacion
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
    //
    /* Set dfecha
     *
     * @param \DateTime $vdescripcion
     * @return Tbdetcotizacion
     */
    public function setVdescripcion($vdescripcion)
    {
        $this->vdescripcion = $vdescripcion;

        return $this;
    }

    /**
     * Get vdescripcion
     *
     * @return \DateTime 
     */
    public function getVdescripcion()
    {
        return $this->vdescripcion;
    }

    //
    public function __toString() {
        return $this->getCodcotizacion();
    }
}
