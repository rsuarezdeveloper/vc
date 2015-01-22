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
     * @ORM\ManyToOne(targetEntity="VC\ReservasBundle\Entity\ReservaMaster" ,inversedBy="hijas")
     * @ORM\JoinColumn(name="master", referencedColumnName="id")
     */
    private $master;


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
     * Set master
     *
     * @param \VC\ReservasBundle\Entity\ReservaMaster $master
     * @return ReservaHijas
     */
    public function setMaster(\VC\ReservasBundle\Entity\ReservaMaster $master = null)
    {
        $this->master = $master;
    
        return $this;
    }

    /**
     * Get master
     *
     * @return \VC\ReservasBundle\Entity\ReservaMaster 
     */
    public function getMaster()
    {
        return $this->master;
    }
}