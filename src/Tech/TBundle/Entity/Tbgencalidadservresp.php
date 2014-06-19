<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgencalidadservresp
 *
 * @ORM\Table(name="tbgenCalidadServResp")
 * @ORM\Entity
 */
class Tbgencalidadservresp
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
     * @ORM\Column(name="vRESPUESTA", type="string", length=80, nullable=false)
     */
    private $vrespuesta;



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
     * Set vrespuesta
     *
     * @param string $vrespuesta
     * @return Tbgencalidadservresp
     */
    public function setVrespuesta($vrespuesta)
    {
        $this->vrespuesta = $vrespuesta;

        return $this;
    }

    /**
     * Get vrespuesta
     *
     * @return string 
     */
    public function getVrespuesta()
    {
        return $this->vrespuesta;
    }
    
                //to string method   
    public function __toString()
    {
        
    return strval($this->getVrespuesta());
    }
}
