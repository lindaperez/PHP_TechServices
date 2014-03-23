<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tblogestatususuario
 *
 * @ORM\Table(name="tblogEstatusUsuario", indexes={@ORM\Index(name="fk_iID_ESTATUS_idx", columns={"fk_iID_ESTATUS"}), @ORM\Index(name="fk_iCI_idx_EU", columns={"fk_iCI"})})
 * @ORM\Entity
 */
class Tblogestatususuario
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
     * @ORM\Column(name="dFECHA_CAMBIO", type="datetime", nullable=false)
     */
    private $dfechaCambio;

    /**
     * @var \Tech\TBundle\Entity\Tbgenestatusregistrousu
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenestatusregistrousu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ESTATUS", referencedColumnName="id")
     * })
     */
    private $fkIidEstatus;

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
     * Set dfechaCambio
     *
     * @param \DateTime $dfechaCambio
     * @return Tblogestatususuario
     */
    public function setDfechaCambio($dfechaCambio)
    {
        $this->dfechaCambio = $dfechaCambio;

        return $this;
    }

    /**
     * Get dfechaCambio
     *
     * @return \DateTime 
     */
    public function getDfechaCambio()
    {
        return $this->dfechaCambio;
    }

    /**
     * Set fkIidEstatus
     *
     * @param \Tech\TBundle\Entity\Tbgenestatusregistrousu $fkIidEstatus
     * @return Tblogestatususuario
     */
    public function setFkIidEstatus(\Tech\TBundle\Entity\Tbgenestatusregistrousu $fkIidEstatus = null)
    {
        $this->fkIidEstatus = $fkIidEstatus;

        return $this;
    }

    /**
     * Get fkIidEstatus
     *
     * @return \Tech\TBundle\Entity\Tbgenestatusregistrousu 
     */
    public function getFkIidEstatus()
    {
        return $this->fkIidEstatus;
    }

    /**
     * Set fkIci
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIci
     * @return Tblogestatususuario
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
