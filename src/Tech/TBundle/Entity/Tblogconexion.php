<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblogconexion
 *
 * @ORM\Table(name="tblogConexion", indexes={@ORM\Index(name="fk_iCI_idx", columns={"fk_iCI"})})
 * @ORM\Entity
 */
class Tblogconexion
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
     * @ORM\Column(name="dFECHA_ACCESO", type="datetime", nullable=false)
     */
    private $dfechaAcceso;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iCI", referencedColumnName="pk_icedula")
     * })
     */
    private $fkIci;



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
     * Set dfechaAcceso
     *
     * @param \DateTime $dfechaAcceso
     * @return Tblogconexion
     */
    public function setDfechaAcceso($dfechaAcceso)
    {
        $this->dfechaAcceso = $dfechaAcceso;

        return $this;
    }

    /**
     * Get dfechaAcceso
     *
     * @return \DateTime 
     */
    public function getDfechaAcceso()
    {
        return $this->dfechaAcceso;
    }

    /**
     * Set fkIci
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIci
     * @return Tblogconexion
     */
    public function setFkIci(\Tech\TBundle\Entity\Tbdetusuariodatos $fkIci = null)
    {
        $this->fkIci = $fkIci;

        return $this;
    }

    /**
     * Get fkIci
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getFkIci()
    {
        return $this->fkIci;
    }
}
