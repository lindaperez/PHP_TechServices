<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgendetalle
 *
 * @ORM\Table(name="tbgenDetalle", indexes={@ORM\Index(name="fk_iID_ESP_SOL", columns={"fk_iID_ESP_SOL"})})
 * @ORM\Entity
 */
class Tbgendetalle
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
     * @ORM\Column(name="vDESCRIPCION", type="string", length=80, nullable=false)
     */
    private $vdescripcion;

    /**
     * @var \Tech\TBundle\Entity\Tbgenespecsolicitud
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenespecsolicitud")
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
     * Set vdescripcion
     *
     * @param string $vdescripcion
     * @return Tbgendetalle
     */
    public function setVdescripcion($vdescripcion)
    {
        $this->vdescripcion = $vdescripcion;

        return $this;
    }

    /**
     * Get vdescripcion
     *
     * @return string 
     */
    public function getVdescripcion()
    {
        return $this->vdescripcion;
    }

    /**
     * Set fkIidEspSol
     *
     * @param \Tech\TBundle\Entity\Tbgenespecsolicitud $fkIidEspSol
     * @return Tbgendetalle
     */
    public function setFkIidEspSol(\Tech\TBundle\Entity\Tbgenespecsolicitud $fkIidEspSol = null)
    {
        $this->fkIidEspSol = $fkIidEspSol;

        return $this;
    }

    /**
     * Get fkIidEspSol
     *
     * @return \Tech\TBundle\Entity\Tbgenespecsolicitud 
     */
    public function getFkIidEspSol()
    {
        return $this->fkIidEspSol;
    }
        //to string method   
    public function __toString()
    {

    return strval($this->vdescripcion);
    }
}
