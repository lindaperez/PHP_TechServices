<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenparametros
 *
 * @ORM\Table(name="tbgenParametros")
 * @ORM\Entity
 */
class Tbgenparametros
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
     * @ORM\Column(name="vDESCRIPCION", type="string", length=45, nullable=true)
     */
    private $vdescripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="iMAX_ACCESO", type="integer", nullable=true)
     */
    private $imaxAcceso;



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
     * @return Tbgenparametros
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

    /**
     * Set imaxAcceso
     *
     * @param integer $imaxAcceso
     * @return Tbgenparametros
     */
    public function setImaxAcceso($imaxAcceso)
    {
        $this->imaxAcceso = $imaxAcceso;

        return $this;
    }

    /**
     * Get imaxAcceso
     *
     * @return integer 
     */
    public function getImaxAcceso()
    {
        return $this->imaxAcceso;
    }
}
