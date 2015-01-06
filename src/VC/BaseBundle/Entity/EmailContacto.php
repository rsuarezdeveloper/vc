<?php

namespace VC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EmailContacto
 *
 * @ORM\Table()
 * @ORM\Entity
 */

class EmailContacto
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
	 * @ORM\Column(name="email", type="string", nullable=true, length=25)
	 *
	 */

	 private $email;

    /**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Contacto" ,inversedBy="emails")
     * @ORM\JoinColumn(name="contacto", referencedColumnName="id")
     */
    private $contacto;

}
