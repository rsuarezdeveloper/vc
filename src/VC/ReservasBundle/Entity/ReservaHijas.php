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

}
