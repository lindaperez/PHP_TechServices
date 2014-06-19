<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgencalidadservpreg
 *
 * @ORM\Table(name="tbgenCalidadServPreg")
 * @ORM\Entity
 */
class Tbgencalidadservpreg
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
     * @ORM\Column(name="vPREGUNTA", type="string", length=85, nullable=false)
     */
    private $vpregunta;



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
     * Set vpregunta
     *
     * @param string $vpregunta
     * @return Tbgencalidadservpreg
     */
    public function setVpregunta($vpregunta)
    {
        $this->vpregunta = $vpregunta;

        return $this;
    }

    /**
     * Get vpregunta
     *
     * @return string 
     */
    public function getVpregunta()
    {
        return $this->vpregunta;
    }
    
            //to string method   
    public function __toString()
    {
        
    return strval($this->getVpregunta());
    }
}
