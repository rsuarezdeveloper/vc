<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proceso
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Proceso
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
	 * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\Reserva")
	 * @ORM\JoinColumn(name="reserva",referencedColumnName="id",nullable=false)
	 * 
	 * 
	 */
	 
	 private $reserva;

    /**
     * @var string
     *
     * @ORM\Column(name="pallet", type="string", length=24)
     */
    private $pallet;

    /**
     * @var float
     *
     * @ORM\Column(name="temp_in", type="float")
     */
    private $tempIn;

    /**
     * @var float
     *
     * @ORM\Column(name="temp_out", type="float")
     */
    private $tempOut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour_in", type="time")
     */
    private $hourIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hour_out", type="time")
     */
    private $hourOut;


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
     * Set pallet
     *
     * @param string $pallet
     * @return Proceso
     */
    public function setPallet($pallet)
    {
        $this->pallet = $pallet;
    
        return $this;
    }

    /**
     * Get pallet
     *
     * @return string 
     */
    public function getPallet()
    {
        return $this->pallet;
    }

    /**
     * Set tempIn
     *
     * @param float $tempIn
     * @return Proceso
     */
    public function setTempIn($tempIn)
    {
        $this->tempIn = $tempIn;
    
        return $this;
    }

    /**
     * Get tempIn
     *
     * @return float 
     */
    public function getTempIn()
    {
        return $this->tempIn;
    }

    /**
     * Set tempOut
     *
     * @param float $tempOut
     * @return Proceso
     */
    public function setTempOut($tempOut)
    {
        $this->tempOut = $tempOut;
    
        return $this;
    }

    /**
     * Get tempOut
     *
     * @return float 
     */
    public function getTempOut()
    {
        return $this->tempOut;
    }

    /**
     * Set hourIn
     *
     * @param \DateTime $hourIn
     * @return Proceso
     */
    public function setHourIn($hourIn)
    {
        $this->hourIn = $hourIn;
    
        return $this;
    }

    /**
     * Get hourIn
     *
     * @return \DateTime 
     */
    public function getHourIn()
    {
        return $this->hourIn;
    }

    /**
     * Set hourOut
     *
     * @param \DateTime $hourOut
     * @return Proceso
     */
    public function setHourOut($hourOut)
    {
        $this->hourOut = $hourOut;
    
        return $this;
    }

    /**
     * Get hourOut
     *
     * @return \DateTime 
     */
    public function getHourOut()
    {
        return $this->hourOut;
    }

    /**
     * Set reserva
     *
     * @param \VC\ReservasBundle\Entity\VCReservasBundle:Reserva $reserva
     * @return Proceso
     */

    /**
     * Set reserva
     *
     * @param \VC\ReservasBundle\Entity\Reserva $reserva
     * @return Proceso
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
}