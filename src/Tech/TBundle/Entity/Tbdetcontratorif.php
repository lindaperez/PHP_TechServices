<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetcontratorif
 *
 * @ORM\Table(name="tbdetContratoRif", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iNRO_CONTRATO_UNIQUE", columns={"pk_iNRO_CONTRATO"})}, indexes={@ORM\Index(name="RIF_idx", columns={"fk_iRIF"})})
 * @ORM\Entity
 */
class Tbdetcontratorif
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
     * @ORM\Column(name="pk_iNRO_CONTRATO", type="integer", nullable=false)
     */
    private $pkInroContrato;

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
