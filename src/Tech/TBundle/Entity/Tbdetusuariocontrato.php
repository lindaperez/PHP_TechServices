<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetusuariocontrato
 *
 * @ORM\Table(name="tbdetUsuarioContrato", uniqueConstraints={@ORM\UniqueConstraint(name="fk_iCI_UNIQUE", columns={"fk_iCI"})}, indexes={@ORM\Index(name="NRO_CONTRATO_idx", columns={"fk_iNRO_CONTRATO"})})
 * @ORM\Entity
 */
class Tbdetusuariocontrato
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
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iCI", referencedColumnName="pk_iCI")
     * })
     */
    private $fkIci;

    /**
     * @var \Tech\TBundle\Entity\Tbdetcontratorif
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetcontratorif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iNRO_CONTRATO", referencedColumnName="pk_iNRO_CONTRATO")
     * })
     */
    private $fkInroContrato;



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
     * Set fkIci
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIci
     * @return Tbdetusuariocontrato
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
     * Set fkInroContrato
     *
     * @param \Tech\TBundle\Entity\Tbdetcontratorif $fkInroContrato
     * @return Tbdetusuariocontrato
     */
    public function setFkInroContrato(\Tech\TBundle\Entity\Tbdetcontratorif $fkInroContrato = null)
    {
        $this->fkInroContrato = $fkInroContrato;

        return $this;
    }

    /**
     * Get fkInroContrato
     *
     * @return \Tech\TBundle\Entity\Tbdetcontratorif 
     */
    public function getFkInroContrato()
    {
        return $this->fkInroContrato;
    }
}
