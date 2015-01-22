<?php

namespace VC\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aerolinea
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Aerolinea
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
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;
    
    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="string", length=255, nullable=true)
     */
    private $pais;
	
	/**
     * @var string
     *
     * @ORM\Column(name="iata", type="string", length=255, nullable=true)
     */
    private $iata;
    
    /**
     * @var string
     *
     * @ORM\Column(name="icao", type="string", length=255, nullable=true)
     */
    private $icao;
    
    
    /**
     * @var text
     *
     * @ORM\Column(name="email", type="text",nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto", type="string", length=255, nullable=true)
     */
    private $contacto;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255, nullable=true)
     */
    private $telefono;

     /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;




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
     * Set nombre
     *
     * @param string $nombre
     * @return Aerolinea
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Aerolinea
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;
    
        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Aerolinea
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set iata
     *
     * @param string $iata
     * @return Aerolinea
     */
    public function setIata($iata)
    {
        $this->iata = $iata;
    
        return $this;
    }

    /**
     * Get iata
     *
     * @return string 
     */
    public function getIata()
    {
        return $this->iata;
    }

    /**
     * Set icao
     *
     * @param string $icao
     * @return Aerolinea
     */
    public function setIcao($icao)
    {
        $this->icao = $icao;
    
        return $this;
    }

    /**
     * Get icao
     *
     * @return string 
     */
    public function getIcao()
    {
        return $this->icao;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Aerolinea
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
     * @param string $contacto
     * @return Aerolinea
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    
        return $this;
    }

    /**
     * Get contacto
     *
     * @return string 
     */
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Aerolinea
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Aerolinea
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }
}