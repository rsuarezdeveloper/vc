<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservaProducto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class ReservaProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   	/**
	 * 
	 * @var float
	 * @ORM\Column(name="peso", type="float",nullable=true)
	 * 
	 */
	 
	 private $peso;



    /**
     * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\Reserva")
     * @ORM\JoinColumn(name="reserva", referencedColumnName="id")
     */
    private $reserva;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255)
     */
    private $nombreProducto;

    
    /**
     * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\TipoCaja")
     * @ORM\JoinColumn(name="tipoCaja",referencedColumnName="id",nullable=true)
     * 
     */
     
     private $tipoCaja; 


    /**
     * @var integer
     *
     * @ORM\Column(name="piezas", type="integer")
     */
    private $piezas;

    /**
     * @var float
     *
     * @ORM\Column(name="fbe", type="decimal",scale=2)
     */
    private $fbe;


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
     * Set nombreProducto
     *
     * @param string $nombreProducto
     * @return ReservaProducto
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;
    
        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set piezas
     *
     * @param integer $piezas
     * @return ReservaProducto
     */
    public function setPiezas($piezas)
    {
        $this->piezas = $piezas;
    
        return $this;
    }

    /**
     * Get piezas
     *
     * @return integer 
     */
    public function getPiezas()
    {
        return $this->piezas;
    }

    /**
     * Set fbe
     *
     * @param float $fbe
     * @return ReservaProducto
     */
    public function setFbe($fbe)
    {
        $this->fbe = $fbe;
    
        return $this;
    }

    /**
     * Get fbe
     *
     * @return float 
     */
    public function getFbe()
    {
        return $this->fbe;
    }

    /**
     * Set reserva
     *
     * @param \VC\ReservasBundle\Entity\Reserva $reserva
     * @return ReservaProducto
     */
    public function setReserva(\VC\ReservasBundle\Entity\Reserva $reserva = null)
    {
        $this->reserva = $reserva;
    
        return $this;
    }

    /**
     * Get reserva
     *
     * @return \VC\ReservasBundle\Entity\Reserva 
     */
    public function getReserva()
    {
        return $this->reserva;
    }

    /**
     * Set peso
     *
     * @param float $peso
     * @return ReservaProducto
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    
        return $this;
    }

    /**
     * Get peso
     *
     * @return float 
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set tipoCaja
     *
     * @param \VC\ReservasBundle\Entity\TipoCaja $tipoCaja
     * @return ReservaProducto
     */
    public function setTipoCaja(\VC\ReservasBundle\Entity\TipoCaja $tipoCaja = null)
    {
        $this->tipoCaja = $tipoCaja;
    
        return $this;
    }

    /**
     * Get tipoCaja
     *
     * @return \VC\ReservasBundle\Entity\TipoCaja 
     */
    public function getTipoCaja()
    {
        return $this->tipoCaja;
    }
}