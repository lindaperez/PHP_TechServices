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
     * @var integer
     *
     * @ORM\Column(name="pk_iRIF", type="integer", nullable=false)
     */
    private $pkIrif;

    /**
     * @var string
     *
     * @ORM\Column(name="vDIRECCION_FISCAL", type="string", length=45, nullable=false)
     */
    private $vdireccionFiscal;



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
     * @param integer $pkIrif
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
     * @return integer 
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

    //to string method   
    public function __toString()
    {

    return strval($this->pkIrif);

}

    
    }
