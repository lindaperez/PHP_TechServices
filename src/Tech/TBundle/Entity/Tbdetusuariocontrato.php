<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tech\TBundle\Entity\Tbdetusuariodatos;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tbdetusuariocontrato
 *
 * @ORM\Table(name="tbdetUsuarioContrato", indexes={@ORM\Index(name="NRO_CONTRATO_idx", columns={"fk_iNRO_CONTRATO"}), @ORM\Index(name="CI_idx", columns={"fk_iCI"})})
 * @ORM\Entity
 */
class Tbdetusuariocontrato
{
    
    protected $usuariodatos;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Tech\TBundle\Entity\Tbdetusuariodatos
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetusuariodatos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iCI", referencedColumnName="id")
     * })
     */
    private $fkIci;

    /**
     * @var \Tech\TBundle\Entity\Tbdetcontratorif
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetcontratorif")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iNRO_CONTRATO", referencedColumnName="id")
     * })
     */
    private $fkInroContrato;
        
    public function __construct()
    {
        $this->usuariodatos = new Tbdetusuariodatos();
        
    }
    public function addUsuarioDatos(Tbdetusuariodatos $usuariodatos)
    {
        if ($this->usuariodatos==null){
            $this->usuariodatos=new ArrayCollection();
            $this->usuariodatos->add($usuariodatos);
        }else{
                if (!$this->usuariodatos->contains($usuariodatos)) {
                
                    $this->usuariodatos->add($usuariodatos);
                }
            }
    }    
    
   
    public function setUsuarioDatos(Tbdetusuariodatos $usuariodatos)
    {
        
            $this->usuariodatos=$usuariodatos;
    }    
    

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
     * Set fkIci
     *
     * @param \Tech\TBundle\Entity\Tbdetusuariodatos $fkIci
     * @return Tbdetusuariocontrato
     */
    public function setFkIci(\Tech\TBundle\Entity\Tbdetusuariodatos $fkIci = null)
    {
        $this->fkIci = $fkIci;

        return $this;
    }

    /**
     * Get fkIci
     *
     * @return \Tech\TBundle\Entity\Tbdetusuariodatos 
     */
    public function getFkIci()
    {
        return $this->fkIci;
    }

    /**
     * Set fkInroContrato
     *
     * @param \Tech\TBundle\Entity\Tbdetcontratorif $fkInroContrato
     * @return Tbdetusuariocontrato
     */
    public function setFkInroContrato(\Tech\TBundle\Entity\Tbdetcontratorif $fkInroContrato = null)
    {
        $this->fkInroContrato = $fkInroContrato;

    }

    /**
     * Get fkInroContrato
     *
     * @return \Tech\TBundle\Entity\Tbdetcontratorif 
     */
    public function getFkInroContrato()
    {
        return $this->fkInroContrato;
    }

    //to string method   
    public function __toString()
    {

    return strval($this->id);
    
    
    }
    
    }