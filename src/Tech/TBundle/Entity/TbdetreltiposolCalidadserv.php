<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbdetreltiposolCalidadserv
 *
 * @ORM\Table(name="tbdetRelTipoSol_CalidadServ", indexes={@ORM\Index(name="fk_tbdetRelTipoSol1", columns={"fk_iTIPO_SOl"}), @ORM\Index(name="fk_tbdetRelTipoSol2", columns={"fk_iCAL_SERV"})})
 * @ORM\Entity
 */
class TbdetreltiposolCalidadserv
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
     * @var \Tech\TBundle\Entity\Tbgentiposolicitud
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgentiposolicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iTIPO_SOl", referencedColumnName="id")
     * })
     */
    private $fkItipoSol;

    /**
     * @var \Tech\TBundle\Entity\Tbgencalidadservpreg
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbgencalidadservpreg")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iCAL_SERV", referencedColumnName="id")
     * })
     */
    private $fkIcalServ;



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
     * Set fkItipoSol
     *
     * @param \Tech\TBundle\Entity\Tbgentiposolicitud $fkItipoSol
     * @return TbdetreltiposolCalidadserv
     */
    public function setFkItipoSol(\Tech\TBundle\Entity\Tbgentiposolicitud $fkItipoSol = null)
    {
        $this->fkItipoSol = $fkItipoSol;

        return $this;
    }

    /**
     * Get fkItipoSol
     *
     * @return \Tech\TBundle\Entity\Tbgentiposolicitud 
     */
    public function getFkItipoSol()
    {
        return $this->fkItipoSol;
    }

    /**
     * Set fkIcalServ
     *
     * @param \Tech\TBundle\Entity\Tbgencalidadservpreg $fkIcalServ
     * @return TbdetreltiposolCalidadserv
     */
    public function setFkIcalServ(\Tech\TBundle\Entity\Tbgencalidadservpreg $fkIcalServ = null)
    {
        $this->fkIcalServ = $fkIcalServ;

        return $this;
    }

    /**
     * Get fkIcalServ
     *
     * @return \Tech\TBundle\Entity\Tbgencalidadservpreg 
     */
    public function getFkIcalServ()
    {
        return $this->fkIcalServ;
    }
}
