<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetcoordinadorpmo
 *
 * @ORM\Table(name="tbdetCoordinadorPMO", indexes={@ORM\Index(name="fk_tbdetCoordinadorPMO_tbdetLiderPMO1", columns={"tbdetLiderPMO_id"}), @ORM\Index(name="fk_tbdetCoordinadorPMO_tbdetUsuarioDatos1", columns={"tbdetUsuarioDatos_id"})})
 * @ORM\Entity
 */
class Tbdetcoordinadorpmo
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
     * @var string
     *
     * @ORM\Column(name="valias", type="string", length=45, nullable=false)
     */
    private $valias;

    /**
     * @var \Tech\TBundle\Entity\Tbdetliderpmo
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetliderpmo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetLiderPMO_id", referencedColumnName="id")
     * })
     */
    private $tbdetliderpmo;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tbdetUsuarioDatos_id", referencedColumnName="id")
     * })
     */
    private $tbdetusuariodatos;



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
     * Set valias
     *
     * @param string $valias
     * @return Tbdetcoordinadorpmo
     */
    public function setValias($valias)
    {
        $this->valias = $valias;

        return $this;
    }

    /**
     * Get valias
     *
     * @return string 
     */
    public function getValias()
    {
        return $this->valias;
    }

    /**
     * Set tbdetliderpmo
     *
     * @param \Tech\TBundle\Entity\Tbdetliderpmo $tbdetliderpmo
     * @return Tbdetcoordinadorpmo
     */
    public function setTbdetliderpmo(\Tech\TBundle\Entity\Tbdetliderpmo $tbdetliderpmo = null)
    {
        $this->tbdetliderpmo = $tbdetliderpmo;

        return $this;
    }

    /**
     * Get tbdetliderpmo
     *
     * @return \Tech\TBundle\Entity\Tbdetliderpmo 
     */
    public function getTbdetliderpmo()
    {
        return $this->tbdetliderpmo;
    }

    /**
     * Set tbdetusuariodatos
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $tbdetusuariodatos
     * @return Tbdetcoordinadorpmo
     */
    public function setTbdetusuariodatos(\Tech\TBundle\Entity\Tbdetusuariodatos $tbdetusuariodatos = null)
    {
        $this->tbdetusuariodatos = $tbdetusuariodatos;

        return $this;
    }

    /**
     * Get tbdetusuariodatos
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getTbdetusuariodatos()
    {
        return $this->tbdetusuariodatos;
    }
}
