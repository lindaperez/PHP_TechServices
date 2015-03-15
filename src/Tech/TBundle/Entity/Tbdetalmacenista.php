<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetalmacenista
 *
 * @ORM\Table(name="tbdetAlmacenista")
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
     * @ORM\Column(name="vAlias", type="string", length=45, nullable=true)
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
}
