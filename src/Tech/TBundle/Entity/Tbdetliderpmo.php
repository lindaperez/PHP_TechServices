<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetliderpmo
 *
 * @ORM\Table(name="tbdetLiderPMO")
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
     * @ORM\Column(name="vAlias", type="string", length=45, nullable=false)
     */
    private $valias;



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
}
