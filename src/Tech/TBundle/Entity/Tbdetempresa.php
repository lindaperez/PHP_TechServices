<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetempresa
 *
 * @ORM\Table(name="tbdetEmpresa", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iRIF_UNIQUE", columns={"pk_iRIF"})})
 * @ORM\Entity
 */
class Tbdetempresa
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
     * @ORM\Column(name="pk_iRIF", type="string", length=15, nullable=false)
     */
    private $pkIrif;

    /**
     * @var string
     *
     * @ORM\Column(name="vDIRECCION_FISCAL", type="string", length=45, nullable=false)
     */
    private $vdireccionFiscal;

    /**
     * @var string
     *
     * @ORM\Column(name="vNOMBRE", type="string", length=45, nullable=false)
     */
    private $vnombre;

    /**
     * @var string
     *
     * @ORM\Column(name="vRAZON_SOCIAL", type="string", length=45, nullable=false)
     */
    private $vrazonSocial;



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
     * Set pkIrif
     *
     * @param string $pkIrif
     * @return Tbdetempresa
     */
    public function setPkIrif($pkIrif)
    {
        $this->pkIrif = $pkIrif;

        return $this;
    }

    /**
     * Get pkIrif
     *
     * @return string 
     */
    public function getPkIrif()
    {
        return $this->pkIrif;
    }

    /**
     * Set vdireccionFiscal
     *
     * @param string $vdireccionFiscal
     * @return Tbdetempresa
     */
    public function setVdireccionFiscal($vdireccionFiscal)
    {
        $this->vdireccionFiscal = $vdireccionFiscal;

        return $this;
    }

    /**
     * Get vdireccionFiscal
     *
     * @return string 
     */
    public function getVdireccionFiscal()
    {
        return $this->vdireccionFiscal;
    }


    /**
     * Get vnombre
     *
     * @return string 
     */
    public function getVnombre()
    {
        return $this->vnombre;
    }
    public function setVnombre($vnombre)
    {
        $this->vnombre = $vnombre;

        return $this;
    }

    /**
     * Set vrazonSocial
     *
     * @param string $vrazonSocial
     * @return Tbdetempresa
     */
    public function setVrazonSocial($vrazonSocial)
    {
        $this->vrazonSocial = $vrazonSocial;

        return $this;
    }

    /**
     * Get vrazonSocial
     *
     * @return string 
     */
    public function getVrazonSocial()
    {
        return $this->vrazonSocial;
    }
    
        //to string method   
    public function __toString()
    {
        
    return strval($this->getVnombre());
    }
}
