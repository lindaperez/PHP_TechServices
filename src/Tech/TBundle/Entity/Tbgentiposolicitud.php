<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgentiposolicitud
 *
 * @ORM\Table(name="tbgenTipoSolicitud")
 * @ORM\Entity
 */
class Tbgentiposolicitud
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
     * @ORM\Column(name="vNOMBRE_TIPO_SOL", type="string", length=80, nullable=false)
     */
    private $vnombreTipoSol;



    
    
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
     * Set vnombreTipoSol
     *
     * @param string $vnombreTipoSol
     * @return Tbgentiposolicitud
     */
    public function setVnombreTipoSol($vnombreTipoSol)
    {
        $this->vnombreTipoSol = $vnombreTipoSol;

        return $this;
    }

    /**
     * Get vnombreTipoSol
     *
     * @return string 
     */
    public function getVnombreTipoSol()
    {
        return $this->vnombreTipoSol;
    }
    
    
     //to string method   
    public function __toString()
    {

    return strval($this->getVnombreTipoSol());
}
}
