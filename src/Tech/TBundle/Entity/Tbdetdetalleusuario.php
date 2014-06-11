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
     * @ORM\Column(name="iID_DETALLE", type="integer", nullable=false)
     */
    private $iidDetalle;

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
     * Set iidDetalle
     *
     * @param integer $iidDetalle
     * @return Tbdetdetalleusuario
     */
    public function setIidDetalle($iidDetalle)
    {
        $this->iidDetalle = $iidDetalle;

        return $this;
    }

    /**
     * Get iidDetalle
     *
     * @return integer 
     */
    public function getIidDetalle()
    {
        return $this->iidDetalle;
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
        //to string method   
    public function __toString()
    {

    return strval($this->getVdetalle());
}
}
