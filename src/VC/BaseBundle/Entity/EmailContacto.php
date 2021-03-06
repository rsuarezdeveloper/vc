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
     * Set email
     *
     * @param string $email
     * @return EmailContacto
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contacto
     *
     * @param \VC\BaseBundle\Entity\Contacto $contacto
     * @return EmailContacto
     */
    public function setContacto(\VC\BaseBundle\Entity\Contacto $contacto = null)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return \VC\BaseBundle\Entity\Contacto 
     */
    public function getContacto()
    {
        return $this->contacto;
    }
}