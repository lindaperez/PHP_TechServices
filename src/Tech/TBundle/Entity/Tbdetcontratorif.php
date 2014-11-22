<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tbdetcontratorif
 *
 * @ORM\Table(name="tbdetContratoRif", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iNRO_CONTRATO_UNIQUE", columns={"pk_iNRO_CONTRATO"})}, indexes={@ORM\Index(name="RIF_idx", columns={"fk_iRIF"})})
 * @ORM\Entity
 */
class Tbdetcontratorif
{
    
    
    protected $usuariocontrato;
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
     * @ORM\Column(name="pk_iNRO_CONTRATO", type="integer", nullable=false)
     */
    private $pkInroContrato;

    /**
     * @var string
     *
     * @ORM\Column(name="vAlias", type="string", length=60, nullable=false)
     */
    private $valias;

    /**
     * @var string
     *
     * @ORM\Column(name="vDNS", type="string", length=256, nullable=false)
     */
    private $vdns;

    /**
     * @var string
     *
     * @ORM\Column(name="vUbicacionFisica", type="string", length=256, nullable=false)
     */
    private $vubicacionfisica;

    /**
     * @var \Tech\TBundle\Entity\Tbdetempresa
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetempresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iRIF", referencedColumnName="id")
     * })
     */
    private $fkIrif;



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
     * Set pkInroContrato
     *
     * @param integer $pkInroContrato
     * @return Tbdetcontratorif
     */
    public function setPkInroContrato($pkInroContrato)
    {
        $this->pkInroContrato = $pkInroContrato;

        return $this;
    }

    /**
     * Get pkInroContrato
     *
     * @return integer 
     */
    public function getPkInroContrato()
    {
        return $this->pkInroContrato;
    }

    /**
     * Set valias
     *
     * @param string $valias
     * @return Tbdetcontratorif
     */
    public function setValias($valias)
    {
        $this->valias = $valias;

        return $this;
    }

    /**
     * Get valias
     *
     * @return string 
     */
    public function getValias()
    {
        return $this->valias;
    }

    /**
     * Set vdns
     *
     * @param string $vdns
     * @return Tbdetcontratorif
     */
    public function setVdns($vdns)
    {
        $this->vdns = $vdns;

        return $this;
    }

    /**
     * Get vdns
     *
     * @return string 
     */
    public function getVdns()
    {
        return $this->vdns;
    }

    /**
     * Set vubicacionfisica
     *
     * @param string $vubicacionfisica
     * @return Tbdetcontratorif
     */
    public function setVubicacionfisica($vubicacionfisica)
    {
        $this->vubicacionfisica = $vubicacionfisica;

        return $this;
    }

    /**
     * Get vubicacionfisica
     *
     * @return string 
     */
    public function getVubicacionfisica()
    {
        return $this->vubicacionfisica;
    }

    /**
     * Set fkIrif
     *
     * @param \Tech\TBundle\Entity\Tbdetempresa $fkIrif
     * @return Tbdetcontratorif
     */
    public function setFkIrif(\Tech\TBundle\Entity\Tbdetempresa $fkIrif = null)
    {
        $this->fkIrif = $fkIrif;

        return $this;
    }

    /**
     * Get fkIrif
     *
     * @return \Tech\TBundle\Entity\Tbdetempresa 
     */
    public function getFkIrif()
    {
        return $this->fkIrif;
    }


      public function __toString()
    {
        return strval($this->pkInroContrato);
}
    
    
    }
