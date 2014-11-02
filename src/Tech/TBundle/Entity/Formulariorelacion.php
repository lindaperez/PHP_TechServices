<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formulariorelacion
 *
 * @ORM\Table(name="formularioRelacion", indexes={@ORM\Index(name="FK_formularioRelacion", columns={"fk_iID_idForm"}), @ORM\Index(name="FK_formularioRelacion_1", columns={"fk_iID_idPreg"})})
 * @ORM\Entity
 */
class Formulariorelacion
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
     * @var \Tech\TBundle\Entity\Formulario
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Formulario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_idForm", referencedColumnName="id")
     * })
     */
    private $fkIidform;

    /**
     * @var \Tech\TBundle\Entity\Preguntaform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Preguntaform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_idPreg", referencedColumnName="id")
     * })
     */
    private $fkIidpreg;



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
     * Set fkIidform
     *
     * @param \Tech\TBundle\Entity\Formulario $fkIidform
     * @return Formulariorelacion
     */
    public function setFkIidform(\Tech\TBundle\Entity\Formulario $fkIidform = null)
    {
        $this->fkIidform = $fkIidform;

        return $this;
    }

    /**
     * Get fkIidform
     *
     * @return \Tech\TBundle\Entity\Formulario 
     */
    public function getFkIidform()
    {
        return $this->fkIidform;
    }

    /**
     * Set fkIidpreg
     *
     * @param \Tech\TBundle\Entity\Preguntaform $fkIidpreg
     * @return Formulariorelacion
     */
    public function setFkIidpreg(\Tech\TBundle\Entity\Preguntaform $fkIidpreg = null)
    {
        $this->fkIidpreg = $fkIidpreg;

        return $this;
    }

    /**
     * Get fkIidpreg
     *
     * @return \Tech\TBundle\Entity\Preguntaform 
     */
    public function getFkIidpreg()
    {
        return $this->fkIidpreg;
    }
}
