<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Tbgensolicitudservicio
 *
 * @ORM\Table(name="tbgenSolicitudServicio", indexes={@ORM\Index(name="fk_iID_USUA_DATOS", columns={"fk_iID_USUA_DATOS"}), @ORM\Index(name="fk_iID_TIPO_SOL", columns={"fk_iID_ESP_SOL"})})
 * @ORM\Entity
 */
class Tbgensolicitudservicio
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
     * @var \DateTime
     *
     * @ORM\Column(name="dFECHA_CREACION", type="datetime", nullable=false)
     */
    private $dfechaCreacion;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_USUA_DATOS", referencedColumnName="id")
     * })
     */
    private $fkIidUsuaDatos;

    /**
     * @var \Tech\TBundle\Entity\Tbgenespecsolicitud
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenespecsolicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ESP_SOL", referencedColumnName="id")
     * })
     */
    private $fkIidEspSol;

    private $vdetalles;
    private $vdescripcion;
    private $vpersona;
    private $vdireccion;
    private $vtelefono;
    private $vcorreo;

    public function setVdetalles($vdetalles)
    {
        $this->vdetalles = $vdetalles;

        return $this;
    }

    
    public function getVdetalles()
    {
        return $this->vdetalles;
    }
    
      
    public function setVdescripcion($vdescripcion)
    {
        $this->vdescripcion = $vdescripcion;

        return $this;
    }

    
    public function getVdescripcion()
    {
        return $this->vdescripcion;
    } 
    
    public function setVpersona($vpersona)
    {
        $this->vpersona= $vpersona;

        return $this;
    }

    
    public function getVpersona()
    {
        return $this->vpersona;
    }
    
      public function setVdireccion($vdireccion)
    {
        $this->vdireccion= $vdireccion;

        return $this;
    }

    
    public function getVdireccion()
    {
        return $this->vdireccion;
    }
    
    public function setVtelefono($vtelefono)
    {
        $this->vtelefono= $vtelefono;

        return $this;
    }

    
    public function getVtelefono()
    {
        return $this->vtelefono;
    }
     public function setVcorreo($vcorreo)
    {
        $this->vcorreo= $vcorreo;

        return $this;
    }

    
    public function getVcorreo()
    {
        return $this->vcorreo;
    }
     
    
    
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
     * Set dfechaCreacion
     *
     * @param \DateTime $dfechaCreacion
     * @return Tbgensolicitudservicio
     */
    public function setDfechaCreacion($dfechaCreacion)
    {
        $this->dfechaCreacion = $dfechaCreacion;

        return $this;
    }

    /**
     * Get dfechaCreacion
     *
     * @return \DateTime 
     */
    public function getDfechaCreacion()
    {
        return $this->dfechaCreacion;
    }

    /**
     * Set fkIidUsuaDatos
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatos
     * @return Tbgensolicitudservicio
     */
    public function setFkIidUsuaDatos(\Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatos = null)
    {
        $this->fkIidUsuaDatos = $fkIidUsuaDatos;

        return $this;
    }

    /**
     * Get fkIidUsuaDatos
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getFkIidUsuaDatos()
    {
        return $this->fkIidUsuaDatos;
    }

    /**
     * Set fkIidEspSol
     *
     * @param \Tech\TBundle\Entity\Tbgenespecsolicitud $fkIidEspSol
     * @return Tbgensolicitudservicio
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
        
    return strval($this->getId());
    }
    
}
