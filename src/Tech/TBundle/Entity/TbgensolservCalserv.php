<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbgensolservCalserv
 *
 * @ORM\Table(name="tbgenSolServ_CalServ", indexes={@ORM\Index(name="fk_iID_SOL_SERV", columns={"fk_iID_SOL"})})
 * @ORM\Entity
 */
class TbgensolservCalserv
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
     * @var integer
     *
     * @ORM\Column(name="iCAL_SOl_PREG", type="integer", nullable=false)
     */
    private $icalSolPreg;

    /**
     * @var integer
     *
     * @ORM\Column(name="iRESPUESTA", type="integer", nullable=false)
     */
    private $irespuesta;

    /**
     * @var \Tech\TBundle\Entity\Tbgensolicitudservicio
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgensolicitudservicio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_SOL", referencedColumnName="id")
     * })
     */
    private $fkIidSol;



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
     * Set icalSolPreg
     *
     * @param integer $icalSolPreg
     * @return TbgensolservCalserv
     */
    public function setIcalSolPreg($icalSolPreg)
    {
        $this->icalSolPreg = $icalSolPreg;

        return $this;
    }

    /**
     * Get icalSolPreg
     *
     * @return integer 
     */
    public function getIcalSolPreg()
    {
        return $this->icalSolPreg;
    }

    /**
     * Set irespuesta
     *
     * @param integer $irespuesta
     * @return TbgensolservCalserv
     */
    public function setIrespuesta($irespuesta)
    {
        $this->irespuesta = $irespuesta;

        return $this;
    }

    /**
     * Get irespuesta
     *
     * @return integer 
     */
    public function getIrespuesta()
    {
        return $this->irespuesta;
    }

    /**
     * Set fkIidSol
     *
     * @param \Tech\TBundle\Entity\Tbgensolicitudservicio $fkIidSol
     * @return TbgensolservCalserv
     */
    public function setFkIidSol(\Tech\TBundle\Entity\Tbgensolicitudservicio $fkIidSol = null)
    {
        $this->fkIidSol = $fkIidSol;

        return $this;
    }

    /**
     * Get fkIidSol
     *
     * @return \Tech\TBundle\Entity\Tbgensolicitudservicio 
     */
    public function getFkIidSol()
    {
        return $this->fkIidSol;
    }
}
