<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetcotizacion
 *
 * @ORM\Table(name="tbdetCotizacion", indexes={@ORM\Index(name="fk_tbdetCotizacion_Cont", columns={"tbdetCotizacioncol"}), @ORM\Index(name="fk_tbdetCotizacion_1", columns={"fk_iID_EstatusInstalacion"})})
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
     * @var integer
     *
     * @ORM\Column(name="codCotizacion", type="integer", nullable=false)
     */
    private $codcotizacion;

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
     * @var \Tech\TBundle\Entity\Tbdetestatusinstalacion
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetestatusinstalacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_EstatusInstalacion", referencedColumnName="id")
     * })
     */
    private $fkIidEstatusinstalacion;



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
     * @param integer $codcotizacion
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
     * @return integer 
     */
    public function getCodcotizacion()
    {
        return $this->codcotizacion;
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
}
