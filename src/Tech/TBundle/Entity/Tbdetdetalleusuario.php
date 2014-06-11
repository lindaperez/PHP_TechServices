<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetdetalleusuario
 *
 * @ORM\Table(name="tbdetDetalleUsuario", indexes={@ORM\Index(name="fk_iID_SOL_USU", columns={"fk_iID_SOL_USU"})})
 * @ORM\Entity
 */
class Tbdetdetalleusuario
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
     * @ORM\Column(name="vDETALLE", type="string", length=200, nullable=false)
     */
    private $vdetalle;

    /**
     * @var \Tech\TBundle\Entity\Tbgensolicitudservicio
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgensolicitudservicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_SOL_USU", referencedColumnName="id")
     * })
     */
    private $fkIidSolUsu;



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
     * Set vdetalle
     *
     * @param string $vdetalle
     * @return Tbdetdetalleusuario
     */
    public function setVdetalle($vdetalle)
    {
        $this->vdetalle = $vdetalle;

        return $this;
    }

    /**
     * Get vdetalle
     *
     * @return string 
     */
    public function getVdetalle()
    {
        return $this->vdetalle;
    }

    /**
     * Set fkIidSolUsu
     *
     * @param \Tech\TBundle\Entity\Tbgensolicitudservicio $fkIidSolUsu
     * @return Tbdetdetalleusuario
     */
    public function setFkIidSolUsu(\Tech\TBundle\Entity\Tbgensolicitudservicio $fkIidSolUsu = null)
    {
        $this->fkIidSolUsu = $fkIidSolUsu;

        return $this;
    }

    /**
     * Get fkIidSolUsu
     *
     * @return \Tech\TBundle\Entity\Tbgensolicitudservicio 
     */
    public function getFkIidSolUsu()
    {
        return $this->fkIidSolUsu;
    }
    
          //to string method   
    public function __toString()
    {
        
    return strval($this->vdetalle);
    }
}
