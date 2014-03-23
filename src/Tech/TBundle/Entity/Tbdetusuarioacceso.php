<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetusuarioacceso
 *
 * @ORM\Table(name="tbdetUsuarioAcceso", indexes={@ORM\Index(name="CI_UA", columns={"fk_iCI"}), @ORM\Index(name="ID_ROL_idx_UA", columns={"fk_iID_ROL"}), @ORM\Index(name="ID_ESTATUS_idx_UA", columns={"fk_iID_ESTATUS"})})
 * @ORM\Entity
 */
class Tbdetusuarioacceso
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
     * @var \Tech\TBundle\Entity\Tbgenrol
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenrol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ROL", referencedColumnName="id")
     * })
     */
    private $fkIidRol;

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
     * @var \Tech\TBundle\Entity\Tbgenestatusregistrousu
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgenestatusregistrousu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_ESTATUS", referencedColumnName="id")
     * })
     */
    private $fkIidEstatus;



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
     * Set fkIidRol
     *
     * @param \Tech\TBundle\Entity\Tbgenrol $fkIidRol
     * @return Tbdetusuarioacceso
     */
    public function setFkIidRol(\Tech\TBundle\Entity\Tbgenrol $fkIidRol = null)
    {
        $this->fkIidRol = $fkIidRol;

        return $this;
    }

    /**
     * Get fkIidRol
     *
     * @return \Tech\TBundle\Entity\Tbgenrol 
     */
    public function getFkIidRol()
    {
        return $this->fkIidRol;
    }

    /**
     * Set fkIci
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIci
     * @return Tbdetusuarioacceso
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

    /**
     * Set fkIidEstatus
     *
     * @param \Tech\TBundle\Entity\Tbgenestatusregistrousu $fkIidEstatus
     * @return Tbdetusuarioacceso
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

    
    
    
    
}
