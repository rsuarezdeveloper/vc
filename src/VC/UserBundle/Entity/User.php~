<?php
// src/Acme/UserBundle/Entity/User.php

namespace VC\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nombre="";
    
    /**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id")
     */
    private $cliente;
    
    
    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre(){
	        return $this->nombre;
        }
     
    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
        
    
    
    /**
     *@return string
     */
     public function __toString(){
	     return $this->nombre;
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
     * Set cliente
     *
     * @param \VC\BaseBundle\Entity\Cliente $cliente
     * @return Reserva
     */
    public function setCliente(\VC\BaseBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \VC\BaseBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

   
}