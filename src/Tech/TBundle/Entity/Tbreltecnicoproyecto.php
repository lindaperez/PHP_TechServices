<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbreltecnicoproyecto
 *
 * @ORM\Table(name="tbrelTecnicoProyecto", indexes={@ORM\Index(name="fk_tbrelTecnicoProyecto_1", columns={"fk_iID_tbdetTecnico"}), @ORM\Index(name="fk_tbrelTecnicoProyecto_2", columns={"fk_iID_tbdetPRoyecto"})})
 * @ORM\Entity
 */
class Tbreltecnicoproyecto
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
     * @ORM\Column(name="dfecha", type="datetime", nullable=false)
     */
    private $dfecha;

    /**
     * @var string
     *
     * @ORM\Column(name="vdescripcionCambioEst", type="string", length=200, nullable=false)
     */
    private $vdescripcioncambioest;

    /**
     * @var \Tech\TBundle\Entity\Tbdettecnico
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdettecnico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetTecnico", referencedColumnName="id")
     * })
     */
    private $fkIidTbdettecnico;

    /**
     * @var \Tech\TBundle\Entity\Tbdetproyecto
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetproyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetPRoyecto", referencedColumnName="id")
     * })
     */
    private $fkIidTbdetproyecto;



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
     * Set dfecha
     *
     * @param \DateTime $dfecha
     * @return Tbreltecnicoproyecto
     */
    public function setDfecha($dfecha)
    {
        $this->dfecha = $dfecha;

        return $this;
    }

    /**
     * Get dfecha
     *
     * @return \DateTime 
     */
    public function getDfecha()
    {
        return $this->dfecha;
    }

    /**
     * Set vdescripcioncambioest
     *
     * @param string $vdescripcioncambioest
     * @return Tbreltecnicoproyecto
     */
    public function setVdescripcioncambioest($vdescripcioncambioest)
    {
        $this->vdescripcioncambioest = $vdescripcioncambioest;

        return $this;
    }

    /**
     * Get vdescripcioncambioest
     *
     * @return string 
     */
    public function getVdescripcioncambioest()
    {
        return $this->vdescripcioncambioest;
    }

    /**
     * Set fkIidTbdettecnico
     *
     * @param \Tech\TBundle\Entity\Tbdettecnico $fkIidTbdettecnico
     * @return Tbreltecnicoproyecto
     */
    public function setFkIidTbdettecnico(\Tech\TBundle\Entity\Tbdettecnico $fkIidTbdettecnico = null)
    {
        $this->fkIidTbdettecnico = $fkIidTbdettecnico;

        return $this;
    }

    /**
     * Get fkIidTbdettecnico
     *
     * @return \Tech\TBundle\Entity\Tbdettecnico 
     */
    public function getFkIidTbdettecnico()
    {
        return $this->fkIidTbdettecnico;
    }

    /**
     * Set fkIidTbdetproyecto
     *
     * @param \Tech\TBundle\Entity\Tbdetproyecto $fkIidTbdetproyecto
     * @return Tbreltecnicoproyecto
     */
    public function setFkIidTbdetproyecto(\Tech\TBundle\Entity\Tbdetproyecto $fkIidTbdetproyecto = null)
    {
        $this->fkIidTbdetproyecto = $fkIidTbdetproyecto;

        return $this;
    }

    /**
     * Get fkIidTbdetproyecto
     *
     * @return \Tech\TBundle\Entity\Tbdetproyecto 
     */
    public function getFkIidTbdetproyecto()
    {
        return $this->fkIidTbdetproyecto;
    }
    
 
}
