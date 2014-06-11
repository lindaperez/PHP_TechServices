<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetdetalleusuario
 *
 * @ORM\Table(name="tbdetDetalleUsuario")
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
     * @var integer
     *
     * @ORM\Column(name="vDETALLE", type="integer", nullable=false)
     */
    private $vdetalle;



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
     * @param integer $vdetalle
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
     * @return integer 
     */
    public function getVdetalle()
    {
        return $this->vdetalle;
    }
    /**
     * @var \Tech\TBundle\Entity\Tbgensolicitudservicio
     */
    private $fkIidSolUsu;


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
        
    return strval($this->getVdetalle());
    }
    }
