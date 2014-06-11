<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenespecsolicitud
 *
 * @ORM\Table(name="tbgenEspecSolicitud", indexes={@ORM\Index(name="fk_iID_ESP_SOLD", columns={"fk_iID_ESP_SOL"})})
 * @ORM\Entity
 */
class Tbgenespecsolicitud
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
     * @ORM\Column(name="vNOMBRE_ESP_SOL", type="string", length=80, nullable=false)
     */
    private $vnombreEspSol;

    /**
     * @var \Tech\TBundle\Entity\Tbgentiposolicitud
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgentiposolicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ESP_SOL", referencedColumnName="id")
     * })
     */
    private $fkIidEspSol;



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
     * Set vnombreEspSol
     *
     * @param string $vnombreEspSol
     * @return Tbgenespecsolicitud
     */
    public function setVnombreEspSol($vnombreEspSol)
    {
        $this->vnombreEspSol = $vnombreEspSol;

        return $this;
    }

    /**
     * Get vnombreEspSol
     *
     * @return string 
     */
    public function getVnombreEspSol()
    {
        return $this->vnombreEspSol;
    }

    /**
     * Set fkIidEspSol
     *
     * @param \Tech\TBundle\Entity\Tbgentiposolicitud $fkIidEspSol
     * @return Tbgenespecsolicitud
     */
    public function setFkIidEspSol(\Tech\TBundle\Entity\Tbgentiposolicitud $fkIidEspSol = null)
    {
        $this->fkIidEspSol = $fkIidEspSol;

        return $this;
    }

    /**
     * Get fkIidEspSol
     *
     * @return \Tech\TBundle\Entity\Tbgentiposolicitud 
     */
    public function getFkIidEspSol()
    {
        return $this->fkIidEspSol;
    }

    //to string method   
    public function __toString()
    {

    return strval($this->getVnombreEspSol());
    }
    
    }
