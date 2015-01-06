<?php

namespace VC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Contacto
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

     /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var text
     *
     * @ORM\Column(name="email", type="text")
     */
    private $email;

    /**
	 *@ORM\OneToMany(targetEntity="VC\BaseBundle\Entity\EmailContacto",mappedBy="contacto",cascade={"persist"})
	 */

	private $emails;

}
