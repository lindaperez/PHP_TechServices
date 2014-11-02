<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personarespuesta
 *
 * @ORM\Table(name="PersonaRespuesta", indexes={@ORM\Index(name="Fk_PersonaRespuesta_1", columns={"id_RelForm"}), @ORM\Index(name="Fk_PersonaRespuesta_2", columns={"id_Preg"}), @ORM\Index(name="Fk_PersonaRespuesta_3", columns={"id_Resp"})})
 * @ORM\Entity
 */
class Personarespuesta
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
     * @var \Tech\TBundle\Entity\Personarelform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Personarelform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_RelForm", referencedColumnName="id")
     * })
     */
    private $idRelform;

    /**
     * @var \Tech\TBundle\Entity\Preguntaform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Preguntaform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Preg", referencedColumnName="id")
     * })
     */
    private $idPreg;

    /**
     * @var \Tech\TBundle\Entity\Respuestaform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Respuestaform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_Resp", referencedColumnName="id")
     * })
     */
    private $idResp;



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
     * Set idRelform
     *
     * @param \Tech\TBundle\Entity\Personarelform $idRelform
     * @return Personarespuesta
     */
    public function setIdRelform(\Tech\TBundle\Entity\Personarelform $idRelform = null)
    {
        $this->idRelform = $idRelform;

        return $this;
    }

    /**
     * Get idRelform
     *
     * @return \Tech\TBundle\Entity\Personarelform 
     */
    public function getIdRelform()
    {
        return $this->idRelform;
    }

    /**
     * Set idPreg
     *
     * @param \Tech\TBundle\Entity\Preguntaform $idPreg
     * @return Personarespuesta
     */
    public function setIdPreg(\Tech\TBundle\Entity\Preguntaform $idPreg = null)
    {
        $this->idPreg = $idPreg;

        return $this;
    }

    /**
     * Get idPreg
     *
     * @return \Tech\TBundle\Entity\Preguntaform 
     */
    public function getIdPreg()
    {
        return $this->idPreg;
    }

    /**
     * Set idResp
     *
     * @param \Tech\TBundle\Entity\Respuestaform $idResp
     * @return Personarespuesta
     */
    public function setIdResp(\Tech\TBundle\Entity\Respuestaform $idResp = null)
    {
        $this->idResp = $idResp;

        return $this;
    }

    /**
     * Get idResp
     *
     * @return \Tech\TBundle\Entity\Respuestaform 
     */
    public function getIdResp()
    {
        return $this->idResp;
    }
}
