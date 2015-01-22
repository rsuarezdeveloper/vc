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
}
