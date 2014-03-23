<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Tech\TBundle\Entity\Tbdetusuarioacceso;

/**
 * Tbdetusuariodatos
 *
 * @ORM\Table(name="tbdetUsuarioDatos", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iCI_UNIQUE", columns={"pk_iCI"})})
 * @ORM\Entity
 */
class Tbdetusuariodatos implements UserInterface
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
     * @ORM\Column(name="pk_iCI", type="integer", nullable=false)
     */
    private $pkIci;

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


//Para implementar los metodos de UserInterfaces

//Returns the roles granted to the user. 
//Corregir
 public function getRoles()
    {
	//Corregir
        return array('ROLE_ADMIN');
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
        return $user->getUsername() == $this->getPkIci();
    }
//Usuario Corregir
    public function getUsername()
    {
	//Corregir
        return $this->getPkIci();
    }
//Contrasena
    public function getPassword()
    {
	//Corregir
        return "uAuRGx+2eJOnhrKRFaIForoAEjPBpLsZveBvDWPOLt5b4O3IXp0LbwaPfxb+87wpW1Js0ZXrzjBNT+nU48Nqvg==";
    }
//to string method   
    public function __toString()
    {

    return strval($this->pkIci);

}

}
