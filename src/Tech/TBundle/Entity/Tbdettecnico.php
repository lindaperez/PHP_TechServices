<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdettecnico
 *
 * @ORM\Table(name="tbdetTecnico", indexes={@ORM\Index(name="fk_tbdetTecnico_1", columns={"fk_iID_USUA_DATOSTECN"})})
 * @ORM\Entity
 */
class Tbdettecnico
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
     *   @ORM\JoinColumn(name="fk_iID_USUA_DATOSTECN", referencedColumnName="id")
     * })
     */
    private $fkIidUsuaDatostecn;



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
     * @return Tbdettecnico
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
     * Set fkIidUsuaDatostecn
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatostecn
     * @return Tbdettecnico
     */
    public function setFkIidUsuaDatostecn(\Tech\TBundle\Entity\Tbdetusuariodatos $fkIidUsuaDatostecn = null)
    {
        $this->fkIidUsuaDatostecn = $fkIidUsuaDatostecn;

        return $this;
    }

    /**
     * Get fkIidUsuaDatostecn
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getFkIidUsuaDatostecn()
    {
        return $this->fkIidUsuaDatostecn;
    }
}
