<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Tech\TBundle\Entity\Tbdetusuarioacceso;
use Tech\TBundle\Entity\Tbdetusuariocontrato;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Tbdetusuariodatos
 *
 * @ORM\Table(name="tbdetUsuarioDatos", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iCI_UNIQUE", columns={"pk_iCI"})})
 * @ORM\Entity
 */
class Tbdetusuariodatos implements UserInterface, \Serializable
{
    /**
    * @ORM\ManyToMany(targetEntity="Tbdetcontratorif", cascade={"persist"})
    */
    protected $contratos; 
    protected $usuarioacceso;
    protected $vrif;
    protected $vcontrato;
    protected $valias;
    
  
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->pkIci,
            $this->vclave,
            $this->vnombre,
            $this->vapellido
            // see section on salt below
            // $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->pkIci,
            $this->vclave,
            $this->vnombre,
            $this->vapellido
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }    
    
    public function __construct()
    {
        $this->contratos = new ArrayCollection();
        
    }
    
  
    public function addContrato(Tbdetusuariocontrato $contrato=null)
    {
        //$contrato->addUsuarioDatos($this);
        if ($this->contratos==null){
            
           $this->contratos=new ArrayCollection();
        }
        $this->contratos->add($contrato);
    }

    public function removeContrato(Tbdetusuariocontrato $contrato=null)
    {
        if ($this->contratos!=null){
         $this->contratos->removeElement($contrato);
    
        }
    }
    
   
    
    public function getContratos()
    {
        return $this->contratos;
    }
    public function setContratos($contratos)
    {       
           $this->contratos=$contratos;

    }
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
     * @ORM\Column(name="pk_iCI", type="integer", nullable=false)
     */
    private $pkIci;

    /**
     * @var string
     *
     * @ORM\Column(name="vTIPO_CI", type="string", length=45, nullable=false)
     */
    private $vtipoCi;

    /**
     * @var string
     *
     * @ORM\Column(name="vNOMBRE", type="string", length=25, nullable=false)
     */
    private $vnombre;

    /**
     * @var string
     *
     * @ORM\Column(name="vAPELLIDO", type="string", length=25, nullable=false)
     */
    private $vapellido;

    /**
     * @var string
     *
     * @ORM\Column(name="vCORREO_EMAIL", type="string", length=40, nullable=false)
     */
    private $vcorreoEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="vTELF_LOCAL", type="string", length=15, nullable=false)
     */
    private $vtelfLocal;

    /**
     * @var string
     *
     * @ORM\Column(name="vTELF_MOVIL", type="string", length=15, nullable=false)
     */
    private $vtelfMovil;

    /**
     * @var string
     *
     * @ORM\Column(name="vCARGO", type="string", length=25, nullable=false)
     */
    private $vcargo;

    /**
     * @var string
     *
     * @ORM\Column(name="vDEPARTAMENTO", type="string", length=25, nullable=false)
     */
    private $vdepartamento;

    /**
     * @var string
     *
     * @ORM\Column(name="vSUCURSAL", type="string", length=25, nullable=false)
     */
    private $vsucursal;

    /**
     * @var string
     *
     * @ORM\Column(name="vCLAVE", type="string", length=120, nullable=false)
     */
    private $vclave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dFECHA_REGISTRO", type="datetime", nullable=false)
     */
    private $dfechaRegistro;



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
     * Set pkIci
     *
     * @param integer $pkIci
     * @return Tbdetusuariodatos
     */
    public function setPkIci($pkIci)
    {
        $this->pkIci = $pkIci;

        return $this;
    }

    /**
     * Get pkIci
     *
     * @return integer 
     */
    public function getPkIci()
    {
        return $this->pkIci;
    }

    /**
     * Set vtipoCi
     *
     * @param string $vtipoCi
     * @return Tbdetusuariodatos
     */
    public function setVtipoCi($vtipoCi)
    {
        $this->vtipoCi = $vtipoCi;

        return $this;
    }

    /**
     * Get vtipoCi
     *
     * @return string 
     */
    public function getVtipoCi()
    {
        return $this->vtipoCi;
    }

    /**
     * Set vnombre
     *
     * @param string $vnombre
     * @return Tbdetusuariodatos
     */
    public function setVnombre($vnombre)
    {
        $this->vnombre = $vnombre;

        return $this;
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

    /**
     * Set vapellido
     *
     * @param string $vapellido
     * @return Tbdetusuariodatos
     */
    public function setVapellido($vapellido)
    {
        $this->vapellido = $vapellido;

        return $this;
    }

    /**
     * Get vapellido
     *
     * @return string 
     */
    public function getVapellido()
    {
        return $this->vapellido;
    }

    /**
     * Set vcorreoEmail
     *
     * @param string $vcorreoEmail
     * @return Tbdetusuariodatos
     */
    public function setVcorreoEmail($vcorreoEmail)
    {
        $this->vcorreoEmail = $vcorreoEmail;

        return $this;
    }

    /**
     * Get vcorreoEmail
     *
     * @return string 
     */
    public function getVcorreoEmail()
    {
        return $this->vcorreoEmail;
    }

    /**
     * Set vtelfLocal
     *
     * @param string $vtelfLocal
     * @return Tbdetusuariodatos
     */
    public function setVtelfLocal($vtelfLocal)
    {
        $this->vtelfLocal = $vtelfLocal;

        return $this;
    }

    /**
     * Get vtelfLocal
     *
     * @return string 
     */
    public function getVtelfLocal()
    {
        return $this->vtelfLocal;
    }

    /**
     * Set vtelfMovil
     *
     * @param string $vtelfMovil
     * @return Tbdetusuariodatos
     */
    public function setVtelfMovil($vtelfMovil)
    {
        $this->vtelfMovil = $vtelfMovil;

        return $this;
    }

    /**
     * Get vtelfMovil
     *
     * @return string 
     */
    public function getVtelfMovil()
    {
        return $this->vtelfMovil;
    }

    /**
     * Set vcargo
     *
     * @param string $vcargo
     * @return Tbdetusuariodatos
     */
    public function setVcargo($vcargo)
    {
        $this->vcargo = $vcargo;

        return $this;
    }

    /**
     * Get vcargo
     *
     * @return string 
     */
    public function getVcargo()
    {
        return $this->vcargo;
    }

    /**
     * Set vdepartamento
     *
     * @param string $vdepartamento
     * @return Tbdetusuariodatos
     */
    public function setVdepartamento($vdepartamento)
    {
        $this->vdepartamento = $vdepartamento;

        return $this;
    }

    /**
     * Get vdepartamento
     *
     * @return string 
     */
    public function getVdepartamento()
    {
        return $this->vdepartamento;
    }

    /**
     * Set vsucursal
     *
     * @param string $vsucursal
     * @return Tbdetusuariodatos
     */
    public function setVsucursal($vsucursal)
    {
        $this->vsucursal = $vsucursal;

        return $this;
    }

    /**
     * Get vsucursal
     *
     * @return string 
     */
    public function getVsucursal()
    {
        return $this->vsucursal;
    }

    /**
     * Set vclave
     *
     * @param string $vclave
     * @return Tbdetusuariodatos
     */
    public function setVclave($vclave)
    {
        $this->vclave = $vclave;

        return $this;
    }

    /**
     * Get vclave
     *
     * @return string 
     */
    public function getVclave()
    {
        return $this->vclave;
    }

    /**
     * Set dfechaRegistro
     *
     * @param \DateTime $dfechaRegistro
     * @return Tbdetusuariodatos
     */
    public function setDfechaRegistro($dfechaRegistro)
    {
        $this->dfechaRegistro = $dfechaRegistro;

        return $this;
    }

    /**
     * Get dfechaRegistro
     *
     * @return \DateTime 
     */
    public function getDfechaRegistro()
    {
        return $this->dfechaRegistro;
    }

//to string method   
    public function __toString()
    {

    return strval($this->pkIci);

}
 
    public function getUsuarioacceso()
    {
        return $this->usuarioacceso;
    }
 
    public function setUsuarioacceso(Tbdetusuarioacceso $usuarioacceso = null)
    {
        $this->usuarioacceso = $usuarioacceso;
    }
     // ...

    public function getVrif()
    {
        return $this->vrif;
    }
 
    public function setVrif($vrif = null)
    {
        $this->vrif = $vrif;
    }
        // ...

    public function getVcontrato()
    {
        return $this->vcontrato;
    }
 
    public function setVcontrato($vcontrato = null)
    {
        $this->vcontrato = $vcontrato;
    }
//Para implementar los metodos de UserInterfaces

//Returns the roles granted to the user. 
//Corregir
 public function getRoles()
    {
	//Corregir
        return array('ROLE_USER');
}
 //Returns the salt that was originally used to encode the password.
    public function getSalt()
    {
        return null;
    }
 //Removes sensitive data from the user.

    public function eraseCredentials()
    {
        
    }
//Returns whether or not the given user is equivalent to this user.
    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->pkIci;
    }
//Usuario Corregir
    public function getUsername()
    {
	//Corregir
        return $this->pkIci;    
    }
        public function setUsername($username)
    {
	//Corregir
        $this->pkIci=(int)$username;    
    }
    //Contrasena
    public function getPassword()   
    {
	//Corregir
        return $this->vclave;
    }
    public function setPassword($vclave)   
    {
	//Corregir
        $this->vclave=$vclave;
    }
    /**
     * Set valias Para registro de tecnicos almacenistas coordinadores lideres
     *
     * @param string $valias
     * @return Tbdetusuariodatos
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
}
