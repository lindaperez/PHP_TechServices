<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Tbgensolicitudservicio
 *
 * @ORM\Table(name="tbgenSolicitudServicio", indexes={@ORM\Index(name="fk_iID_USUA_DATOS", columns={"fk_iID_USUA_DATOS"}), @ORM\Index(name="fk_iID_TIPO_SOL", columns={"fk_iID_ESP_SOL"}), @ORM\Index(name="iID_CASO", columns={"iID_CASO"}), @ORM\Index(name="fk_iID_Contrato", columns={"fk_iID_Contrato"})})
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
     * @var string
     *
     * @ORM\Column(name="vdesc_Estatus", type="string", length=200, nullable=false)
     */
    private $vdescEstatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dFECHA_CIERRE", type="datetime", nullable=true)
     */
    private $dfechaCierre;

    /**
     * @var integer
     *
     * @ORM\Column(name="iID_CASO", type="bigint", nullable=false)
     */
    private $iidCaso;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariocontrato
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariocontrato")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_Contrato", referencedColumnName="id")
     * })
     */
    private $fkIidContrato;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_USUA_DATOS", referencedColumnName="id")
     * })
     */
    private $fkIidUsuaDatos;

    
    private $vdetalles;
    private $vdescripcion;
    private $vpersona;
    private $vdireccion;
    private $vtelefono;
    private $vcorreo;
    private $iid;
    

    public function __construct()
    {
        $this->fkIidContrato = new ArrayCollection();
        
    }
    public function addContrato(Tbdetusuariocontrato $contrato=null)
    {
        //$contrato->addUsuarioDatos($this);
        if ($this->fkIidContrato==null){
            
           $this->fkIidContrato=new ArrayCollection();
        }
        $this->fkIidContrato->add($contrato);
    }

    public function removeContrato(Tbdetusuariocontrato $contrato=null)
    {
        if ($this->fkIidContrato!=null){
         $this->fkIidContrato->removeElement($contrato);
    
        }
    }
    
   
    
    
    public function serialize()
    {
        return serialize(array(
            $this->id,
       
            // see section on salt below
            // $this->salt,
        ));
    }
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
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    } 

      public function setIid($iid)
    {
        $this->iid= $iid;

        return $this;
    }

    
    public function getIid()
    {
        return $this->id;
    }
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
     * Set vdescEstatus
     *
     * @param string $vdescEstatus
     * @return Tbgensolicitudservicio
     */
    public function setVdescEstatus($vdescEstatus)
    {
        $this->vdescEstatus = $vdescEstatus;

        return $this;
    }

    /**
     * Get vdescEstatus
     *
     * @return string 
     */
    public function getVdescEstatus()
    {
        return $this->vdescEstatus;
    }

    /**
     * Set dfechaCierre
     *
     * @param \DateTime $dfechaCierre
     * @return Tbgensolicitudservicio
     */
    public function setDfechaCierre($dfechaCierre)
    {
        $this->dfechaCierre = $dfechaCierre;

        return $this;
    }

    /**
     * Get dfechaCierre
     *
     * @return \DateTime 
     */
    public function getDfechaCierre()
    {
        return $this->dfechaCierre;
    }

    /**
     * Set iidCaso
     *
     * @param integer $iidCaso
     * @return Tbgensolicitudservicio
     */
    public function setIidCaso($iidCaso)
    {
        $this->iidCaso = $iidCaso;

        return $this;
    }

    /**
     * Get iidCaso
     *
     * @return integer 
     */
    public function getIidCaso()
    {
        return $this->iidCaso;
    }

    /**
     * Set fkIidContrato
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariocontrato $fkIidContrato
     * @return Tbgensolicitudservicio
     */
    public function setFkIidContrato(\Tech\TBundle\Entity\Tbdetusuariocontrato $fkIidContrato = null)
    {
        $this->fkIidContrato = $fkIidContrato;

        return $this;
    }

    /**
     * Get fkIidContrato
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariocontrato 
     */
    public function getFkIidContrato()
    {
        return $this->fkIidContrato;
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
