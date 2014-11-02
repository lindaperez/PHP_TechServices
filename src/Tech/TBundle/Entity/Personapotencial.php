<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personapotencial
 *
 * @ORM\Table(name="PersonaPotencial")
 * @ORM\Entity
 */
class Personapotencial
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
     * @ORM\Column(name="vNOMBRE_COMPLETO", type="string", length=45, nullable=false)
     */
    private $vnombreCompleto;

    /**
     * @var string
     *
     * @ORM\Column(name="vTELEFONO", type="string", length=45, nullable=false)
     */
    private $vtelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="vCORREO_EMAIL", type="string", length=45, nullable=false)
     */
    private $vcorreoEmail;

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
     * Set vnombreCompleto
     *
     * @param string $vnombreCompleto
     * @return Personapotencial
     */
    public function setVnombreCompleto($vnombreCompleto)
    {
        $this->vnombreCompleto = $vnombreCompleto;

        return $this;
    }

    /**
     * Get vnombreCompleto
     *
     * @return string 
     */
    public function getVnombreCompleto()
    {
        return $this->vnombreCompleto;
    }

    /**
     * Set vtelefono
     *
     * @param string $vtelefono
     * @return Personapotencial
     */
    public function setVtelefono($vtelefono)
    {
        $this->vtelefono = $vtelefono;

        return $this;
    }

    /**
     * Get vtelefono
     *
     * @return string 
     */
    public function getVtelefono()
    {
        return $this->vtelefono;
    }

    /**
     * Set vcorreoEmail
     *
     * @param string $vcorreoEmail
     * @return Personapotencial
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
     * Set dfechaRegistro
     *
     * @param \DateTime $dfechaRegistro
     * @return Personapotencial
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
    public function __toString()
    {
        return strval($this->id+' -'+$this->vnombreCompleto);
}
}
