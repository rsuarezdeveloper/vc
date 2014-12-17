<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservaHijas
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class ReservaHijas
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
	 * @var String
	 * @ORM\Column(name="guiaHija", type="string", nullable=true, length=25)
	 *
	 */

	 private $guiaHija;

    /**
     * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\Reserva" ,inversedBy="hijas")
     * @ORM\JoinColumn(name="reserva", referencedColumnName="id")
     */
    private $reserva;


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
     * Set guiaHija
     *
     * @param string $guiaHija
     * @return ReservaHijas
     */
    public function setGuiaHija($guiaHija)
    {
        $this->guiaHija = $guiaHija;
    
        return $this;
    }

    /**
     * Get guiaHija
     *
     * @return string 
     */
    public function getGuiaHija()
    {
        return $this->guiaHija;
    }

    /**
     * Set reserva
     *
     * @param \VC\ReservasBundle\Entity\Reserva $reserva
     * @return ReservaHijas
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