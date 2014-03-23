<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbgenestatusregistrousu
 *
 * @ORM\Table(name="tbgenEstatusRegistroUsu", uniqueConstraints={@ORM\UniqueConstraint(name="pk_iID_ESTATUS_UNIQUE", columns={"pk_iID_ESTATUS"})})
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
     * @var integer
     *
     * @ORM\Column(name="pk_iID_ESTATUS", type="integer", nullable=false)
     */
    private $pkIidEstatus;

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
     * Set pkIidEstatus
     *
     * @param integer $pkIidEstatus
     * @return Tbgenestatusregistrousu
     */
    public function setPkIidEstatus($pkIidEstatus)
    {
        $this->pkIidEstatus = $pkIidEstatus;

        return $this;
    }

    /**
     * Get pkIidEstatus
     *
     * @return integer 
     */
    public function getPkIidEstatus()
    {
        return $this->pkIidEstatus;
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
}
