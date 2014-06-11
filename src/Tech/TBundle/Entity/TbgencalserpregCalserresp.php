<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbgencalserpregCalserresp
 *
 * @ORM\Table(name="tbgenCalSerPreg_CalSerResp", indexes={@ORM\Index(name="fk_iID_CAL_SER_PREG", columns={"fk_iID_CAL_SER_PREG"}), @ORM\Index(name="fk_iID_CAL_SER_RESP", columns={"fk_iID_CAL_SER_RESP"})})
 * @ORM\Entity
 */
class TbgencalserpregCalserresp
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
     * @var \Tech\TBundle\Entity\Tbgencalidadservpreg
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgencalidadservpreg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_CAL_SER_PREG", referencedColumnName="id")
     * })
     */
    private $fkIidCalSerPreg;

    /**
     * @var \Tech\TBundle\Entity\Tbgencalidadservresp
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgencalidadservresp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_CAL_SER_RESP", referencedColumnName="id")
     * })
     */
    private $fkIidCalSerResp;



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
     * Set fkIidCalSerPreg
     *
     * @param \Tech\TBundle\Entity\Tbgencalidadservpreg $fkIidCalSerPreg
     * @return TbgencalserpregCalserresp
     */
    public function setFkIidCalSerPreg(\Tech\TBundle\Entity\Tbgencalidadservpreg $fkIidCalSerPreg = null)
    {
        $this->fkIidCalSerPreg = $fkIidCalSerPreg;

        return $this;
    }

    /**
     * Get fkIidCalSerPreg
     *
     * @return \Tech\TBundle\Entity\Tbgencalidadservpreg 
     */
    public function getFkIidCalSerPreg()
    {
        return $this->fkIidCalSerPreg;
    }

    /**
     * Set fkIidCalSerResp
     *
     * @param \Tech\TBundle\Entity\Tbgencalidadservresp $fkIidCalSerResp
     * @return TbgencalserpregCalserresp
     */
    public function setFkIidCalSerResp(\Tech\TBundle\Entity\Tbgencalidadservresp $fkIidCalSerResp = null)
    {
        $this->fkIidCalSerResp = $fkIidCalSerResp;

        return $this;
    }

    /**
     * Get fkIidCalSerResp
     *
     * @return \Tech\TBundle\Entity\Tbgencalidadservresp 
     */
    public function getFkIidCalSerResp()
    {
        return $this->fkIidCalSerResp;
    }
}
