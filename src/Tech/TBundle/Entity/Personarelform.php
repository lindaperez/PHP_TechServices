<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personarelform
 *
 * @ORM\Table(name="PersonaRelForm", indexes={@ORM\Index(name="FK_PersonaRelForm_1", columns={"id_persona"}), @ORM\Index(name="fk_PersonaRelForm_2", columns={"id_formul"})})
 * @ORM\Entity
 */
class Personarelform
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
     * @var \Tech\TBundle\Entity\Personapotencial
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Personapotencial")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_persona", referencedColumnName="id")
     * })
     */
    private $idPersona;

    /**
     * @var \Tech\TBundle\Entity\Formulario
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Formulario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_formul", referencedColumnName="id")
     * })
     */
    private $idFormul;



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
     * Set idPersona
     *
     * @param \Tech\TBundle\Entity\Personapotencial $idPersona
     * @return Personarelform
     */
    public function setIdPersona(\Tech\TBundle\Entity\Personapotencial $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \Tech\TBundle\Entity\Personapotencial 
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idFormul
     *
     * @param \Tech\TBundle\Entity\Formulario $idFormul
     * @return Personarelform
     */
    public function setIdFormul(\Tech\TBundle\Entity\Formulario $idFormul = null)
    {
        $this->idFormul = $idFormul;

        return $this;
    }

    /**
     * Get idFormul
     *
     * @return \Tech\TBundle\Entity\Formulario 
     */
    public function getIdFormul()
    {
        return $this->idFormul;
    }
}
