<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservaMaster
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class ReservaMaster
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
	 * @ORM\Column(name="guiaMaster", type="string", nullable=true, length=255)
	 *
	 */

	 private $guiaMaster;

    /**
     * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\Reserva" ,inversedBy="master")
     * @ORM\JoinColumn(name="reserva", referencedColumnName="id")
     */
    private $reserva;

    /**
	 *@ORM\OneToMany(targetEntity="VC\ReservasBundle\Entity\ReservaHijas",mappedBy="master",cascade={"persist"})
	 */

	private $hijas;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->hijas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set guiaMaster
     *
     * @param string $guiaMaster
     * @return ReservaMaster
     */
    public function setGuiaMaster($guiaMaster)
    {
        $this->guiaMaster = $guiaMaster;
    
        return $this;
    }

    /**
     * Get guiaMaster
     *
     * @return string 
     */
    public function getGuiaMaster()
    {
        return $this->guiaMaster;
    }

    /**
     * Set reserva
     *
     * @param \VC\ReservasBundle\Entity\Reserva $reserva
     * @return ReservaMaster
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
     * Add hijas
     *
     * @param \VC\ReservasBundle\Entity\ReservaHijas $hijas
     * @return ReservaMaster
     */
    public function addHija(\VC\ReservasBundle\Entity\ReservaHijas $hijas)
    {
        $this->hijas[] = $hijas;
    
        return $this;
    }

    /**
     * Remove hijas
     *
     * @param \VC\ReservasBundle\Entity\ReservaHijas $hijas
     */
    public function removeHija(\VC\ReservasBundle\Entity\ReservaHijas $hijas)
    {
        $this->hijas->removeElement($hijas);
    }

    /**
     * Get hijas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHijas()
    {
        return $this->hijas;
    }
}