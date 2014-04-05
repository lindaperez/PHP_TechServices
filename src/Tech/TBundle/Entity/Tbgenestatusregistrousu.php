<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenestatusregistrousu
 *
 * @ORM\Table(name="tbgenEstatusRegistroUsu")
 * @ORM\Entity
 */
class Tbgenestatusregistrousu
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
     * @ORM\Column(name="vDESCRIPCION", type="string", length=45, nullable=false)
     */
    private $vdescripcion;



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
     * @return Tbgenestatusregistrousu
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
    
    //to string method   
    public function __toString()
    {

    return $this->vdescripcion;

}
    
    }
