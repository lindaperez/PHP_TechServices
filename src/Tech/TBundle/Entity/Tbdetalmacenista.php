<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetalmacenista
 *
 * @ORM\Table(name="tbdetAlmacenista", indexes={@ORM\Index(name="fk_tbdetAlmacenista_1", columns={"fk_iID_USUA_DATOSALM"})})
 * @ORM\Entity
 */
class Tbdetalmacenista
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
     * @ORM\Column(name="vAlias", type="string", length=45, nullable=false)
     */
    private $valias;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_USUA_DATOSALM", referencedColumnName="id")
     * })
     */
    private $fkIidUsuaDatosalm;



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
     * @return Tbdetalmacenista
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
     * Set fkIidUsuaDatosalm
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatosalm
     * @return Tbdetalmacenista
     */
    public function setFkIidUsuaDatosalm(\Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatosalm = null)
    {
        $this->fkIidUsuaDatosalm = $fkIidUsuaDatosalm;

        return $this;
    }

    /**
     * Get fkIidUsuaDatosalm
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getFkIidUsuaDatosalm()
    {
        return $this->fkIidUsuaDatosalm;
    }
}
