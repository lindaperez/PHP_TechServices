<?php

namespace Tech\TBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tbdetrelalmacenisproyecto
 *
 * @ORM\Table(name="tbdetrelAlmacenisProyecto", indexes={@ORM\Index(name="fk_tbdetrelAlmacenisProyecto_1", columns={"fk_iID_tbdetProyecto_Alm"}), @ORM\Index(name="fk_tbdetrelAlmacenisProyecto_2", columns={"fk_iID_tbdetAlmacenista"}), @ORM\Index(name="fk_tbdetrelAlmacenisProyecto_3", columns={"fk_iID_EstatusAlmacen"})})
 * @ORM\Entity
 */
class Tbdetrelalmacenisproyecto
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
     * @ORM\Column(name="dfecha", type="string", length=45, nullable=false)
     */
    private $dfecha;

    /**
     * @var \Tech\TBundle\Entity\Tbdetproyecto
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetproyecto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetProyecto_Alm", referencedColumnName="id")
     * })
     */
    private $fkIidTbdetproyectoAlm;

    /**
     * @var \Tech\TBundle\Entity\Tbdetalmacenista
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetalmacenista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_tbdetAlmacenista", referencedColumnName="id")
     * })
     */
    private $fkIidTbdetalmacenista;

    /**
     * @var \Tech\TBundle\Entity\Tbdetestatusalmacen
     *
     * @ORM\ManyToOne(targetEntity="Tech\TBundle\Entity\Tbdetestatusalmacen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_iID_EstatusAlmacen", referencedColumnName="id")
     * })
     */
    private $fkIidEstatusalmacen;



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
     * Set dfecha
     *
     * @param string $dfecha
     * @return Tbdetrelalmacenisproyecto
     */
    public function setDfecha($dfecha)
    {
        $this->dfecha = $dfecha;

        return $this;
    }

    /**
     * Get dfecha
     *
     * @return string 
     */
    public function getDfecha()
    {
        return $this->dfecha;
    }

    /**
     * Set fkIidTbdetproyectoAlm
     *
     * @param \Tech\TBundle\Entity\Tbdetproyecto $fkIidTbdetproyectoAlm
     * @return Tbdetrelalmacenisproyecto
     */
    public function setFkIidTbdetproyectoAlm(\Tech\TBundle\Entity\Tbdetproyecto $fkIidTbdetproyectoAlm = null)
    {
        $this->fkIidTbdetproyectoAlm = $fkIidTbdetproyectoAlm;

        return $this;
    }

    /**
     * Get fkIidTbdetproyectoAlm
     *
     * @return \Tech\TBundle\Entity\Tbdetproyecto 
     */
    public function getFkIidTbdetproyectoAlm()
    {
        return $this->fkIidTbdetproyectoAlm;
    }

    /**
     * Set fkIidTbdetalmacenista
     *
     * @param \Tech\TBundle\Entity\Tbdetalmacenista $fkIidTbdetalmacenista
     * @return Tbdetrelalmacenisproyecto
     */
    public function setFkIidTbdetalmacenista(\Tech\TBundle\Entity\Tbdetalmacenista $fkIidTbdetalmacenista = null)
    {
        $this->fkIidTbdetalmacenista = $fkIidTbdetalmacenista;

        return $this;
    }

    /**
     * Get fkIidTbdetalmacenista
     *
     * @return \Tech\TBundle\Entity\Tbdetalmacenista 
     */
    public function getFkIidTbdetalmacenista()
    {
        return $this->fkIidTbdetalmacenista;
    }

    /**
     * Set fkIidEstatusalmacen
     *
     * @param \Tech\TBundle\Entity\Tbdetestatusalmacen $fkIidEstatusalmacen
     * @return Tbdetrelalmacenisproyecto
     */
    public function setFkIidEstatusalmacen(\Tech\TBundle\Entity\Tbdetestatusalmacen $fkIidEstatusalmacen = null)
    {
        $this->fkIidEstatusalmacen = $fkIidEstatusalmacen;

        return $this;
    }

    /**
     * Get fkIidEstatusalmacen
     *
     * @return \Tech\TBundle\Entity\Tbdetestatusalmacen 
     */
    public function getFkIidEstatusalmacen()
    {
        return $this->fkIidEstatusalmacen;
    }
}
