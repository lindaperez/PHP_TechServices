<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetliderpmo
 *
 * @ORM\Table(name="tbdetLiderPMO", indexes={@ORM\Index(name="fk_tbdetLiderPMO_tbdetUsuarioDatos1", columns={"tbdetUsuarioDatos_id"})})
 * @ORM\Entity
 */
class Tbdetliderpmo
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
     * @return Tbdetliderpmo
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
     * Set tbdetusuariodatos
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $tbdetusuariodatos
     * @return Tbdetliderpmo
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

    
    public function __toString() {
        return $this->getValias();
    }
    
    }
