<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pregresprel
 *
 * @ORM\Table(name="PregRespRel", indexes={@ORM\Index(name="FK_PregRespRel_1", columns={"id_preg"}), @ORM\Index(name="FK_PregRespRel_2", columns={"id_resp"})})
 * @ORM\Entity
 */
class Pregresprel
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
     * @var \Tech\TBundle\Entity\Preguntaform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Preguntaform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_preg", referencedColumnName="id")
     * })
     */
    private $idPreg;

    /**
     * @var \Tech\TBundle\Entity\Respuestaform
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Respuestaform")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resp", referencedColumnName="id")
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
     * Set idPreg
     *
     * @param \Tech\TBundle\Entity\Preguntaform $idPreg
     * @return Pregresprel
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
     * @return Pregresprel
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
