<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoCaja
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoCaja
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
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="alto", type="float")
     */
    private $alto;

    /**
     * @var float
     *
     * @ORM\Column(name="ancho", type="float")
     */
    private $ancho;

    /**
     * @var float
     *
     * @ORM\Column(name="largo", type="float")
     */
    private $largo;


	/**
	 *var string 
	 * @ORM\Column(name="sigla", type="string")
	 * 
	 */
	 
	 private $sigla;

	/**
	 *var float
	 * @ORM\Column(name="fbe", type="float")
	 * 
	 */
	 
	 private $fbe;

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
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoCaja
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set alto
     *
     * @param float $alto
     * @return TipoCaja
     */
    public function setAlto($alto)
    {
        $this->alto = $alto;
    
        return $this;
    }

    /**
     * Get alto
     *
     * @return float 
     */
    public function getAlto()
    {
        return $this->alto;
    }

    /**
     * Set ancho
     *
     * @param float $ancho
     * @return TipoCaja
     */
    public function setAncho($ancho)
    {
        $this->ancho = $ancho;
    
        return $this;
    }

    /**
     * Get ancho
     *
     * @return float 
     */
    public function getAncho()
    {
        return $this->ancho;
    }

    /**
     * Set largo
     *
     * @param float $largo
     * @return TipoCaja
     */
    public function setLargo($largo)
    {
        $this->largo = $largo;
    
        return $this;
    }

    /**
     * Get largo
     *
     * @return float 
     */
    public function getLargo()
    {
        return $this->largo;
    }

    /**
     * Set sigla
     *
     * @param string $sigla
     * @return TipoCaja
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    
        return $this;
    }

    /**
     * Get sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * Set fbe
     *
     * @param float $fbe
     * @return TipoCaja
     */
    public function setFbe($fbe)
    {
        $this->fbe = $fbe;
    
        return $this;
    }

    /**
     * Get fbe
     *
     * @return float 
     */
    public function getFbe()
    {
        return $this->fbe;
    }
}