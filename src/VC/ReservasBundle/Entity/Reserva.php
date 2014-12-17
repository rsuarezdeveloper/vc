<?php

namespace VC\ReservasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserva
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Reserva
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
     * @var \DateTime
     *
     * @ORM\Column(name="creacion", type="datetime" , nullable=true)
     */

    private $creacion;
    
 
 

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_servicio", type="datetime", nullable=true)
     */
    private $fechaServicio;
    
	/**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Sucursal")
     * @ORM\JoinColumn(name="sucursal", referencedColumnName="id", nullable=true)
     */
	private $sucursal;
    /**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Agencia")
     * @ORM\JoinColumn(name="agencia", referencedColumnName="id", nullable=true)
     */
    private $agencia;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="guia_master", type="string", length=255, nullable=true)
     */
    private $guiaMaster;

    /**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Aerolinea")
     * @ORM\JoinColumn(name="aerolinea", referencedColumnName="id", nullable=true)
     */
    private $aerolinea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_servicio", type="time" , nullable=true)
     */
    private $horaServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="hora_string", type="string" , nullable=true, length=255)
     */
    private $horaString;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", nullable=true)
     */
    private $clasificacion;

    /**
     * @var float
     *
     * @ORM\Column(name="temperatura_requerida", type="decimal", nullable=true)
     */
    private $temperaturaRequerida;

    /**
     * @var float
     *
     * @ORM\Column(name="noPalet", type="decimal", scale=4, nullable=true)
     */
    private $noPalet;

    /**
	 *@ORM\OneToMany(targetEntity="VC\ReservasBundle\Entity\ReservaHijas",mappedBy="reserva",cascade={"persist"})
	 */

	private $hijas;


    /**
     * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Cliente")
     * @ORM\JoinColumn(name="cliente", referencedColumnName="id", nullable=true)
     */
    private $cliente;

	/**
	 * 
	 * @ORM\ManyToOne(targetEntity="VC\BaseBundle\Entity\Status")
	 * @ORM\JoinColumn(name="status", referencedColumnName="id")
	 * 
	 */ 
	 
	 private $status;

     /**
     * @var text
     *
     * @ORM\Column(name="notaAnulada", type="text", nullable=true)
     */
    private $notaAnulada;



    /**
     * @var text
     *
     * @ORM\Column(name="contactoAerolinea", type="text", nullable=true)
     */
    private $contactoAerolinea;

    /**
     * @var text
     *
     * @ORM\Column(name="contactoAgencia", type="text", nullable=true)
     */
    private $contactoAgencia;

    /**
     * @var text
     *
     * @ORM\Column(name="contactoCliente", type="text", nullable=true)
     */
    private $contactoCliente;

	/**
	 * 
	 * @var string
	 * 
	 * @ORM\Column(name="email_contacto",type="string",nullable=true)
	 * 
	 */ 
	 
	 private $mailContacto;


    /**
     * @var string
     *
     * @ORM\Column(name="notas", type="text" , nullable=true)
     */
    private $notas;
    
    /**
     * @ORM\ManyToOne(targetEntity="VC\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="creado_por", referencedColumnName="id", nullable=true)
     */
    private $creado_por;

    /**
     * @ORM\OneToMany(targetEntity="VC\ReservasBundle\Entity\ReservaProducto",mappedBy="reserva",cascade={"persist"})
     */
    private $productos;



    public function __toString()
	{
    	return "{$this->id}";
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
     * Set creacion
     *
     * @param \DateTime $creacion
     * @return Reserva
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;
    
        return $this;
    }

    /**
     * Get creacion
     *
     * @return \DateTime 
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set fechaServicio
     *
     * @param \DateTime $fechaServicio
     * @return Reserva
     */
    public function setFechaServicio($fechaServicio)
    {
        $this->fechaServicio = $fechaServicio;
    
        return $this;
    }

    /**
     * Get fechaServicio
     *
     * @return \DateTime 
     */
    public function getFechaServicio()
    {
        return $this->fechaServicio;
    }

    /**
     * Set guiaMaster
     *
     * @param string $guiaMaster
     * @return Reserva
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
     * Set horaServicio
     *
     * @param \DateTime $horaServicio
     * @return Reserva
     */
    public function setHoraServicio($horaServicio)
    {
        $this->horaServicio = $horaServicio;
    
        return $this;
    }

    /**
     * Get horaServicio
     *
     * @return \DateTime 
     */
    public function getHoraServicio()
    {
        return $this->horaServicio;
    }

    /**
     * Set temperaturaRequerida
     *
     * @param float $temperaturaRequerida
     * @return Reserva
     */
    public function setTemperaturaRequerida($temperaturaRequerida)
    {
        $this->temperaturaRequerida = $temperaturaRequerida;
    
        return $this;
    }

    /**
     * Get temperaturaRequerida
     *
     * @return float 
     */
    public function getTemperaturaRequerida()
    {
        return $this->temperaturaRequerida;
    }

    /**
     * Set contacto
     *
     * @param string $contacto
     * @return Reserva
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
     * Set notas
     *
     * @param string $notas
     * @return Reserva
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;
    
        return $this;
    }

    /**
     * Get notas
     *
     * @return string 
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set creado_por
     *
     * @param \VC\UserBundle\Entity\User $creadoPor
     * @return Reserva
     */
    public function setCreadoPor(\VC\UserBundle\Entity\User $creadoPor = null)
    {
        $this->creado_por = $creadoPor;
    
        return $this;
    }

    /**
     * Get creado_por
     *
     * @return \VC\UserBundle\Entity\User 
     */
    public function getCreadoPor()
    {
        return $this->creado_por;
    }

    /**
     * Set agencia
     *
     * @param \VC\BaseBundle\Entity\Agencia $agencia
     * @return Reserva
     */
    public function setAgencia(\VC\BaseBundle\Entity\Agencia $agencia = null)
    {
        $this->agencia = $agencia;
    
        return $this;
    }

    /**
     * Get agencia
     *
     * @return \VC\BaseBundle\Entity\Agencia 
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Set aerolinea
     *
     * @param \VC\BaseBundle\Entity\Aerolinea $aerolinea
     * @return Reserva
     */
    public function setAerolinea(\VC\BaseBundle\Entity\Aerolinea $aerolinea = null)
    {
        $this->aerolinea = $aerolinea;
    
        return $this;
    }

    /**
     * Get aerolinea
     *
     * @return \VC\BaseBundle\Entity\Aerolinea 
     */
    public function getAerolinea()
    {
        return $this->aerolinea;
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add productos
     *
     * @param \VC\ReservasBundle\Entity\ReservaProducto $productos
     * @return Reserva
     */
    public function addProducto(\VC\ReservasBundle\Entity\ReservaProducto $productos)
    {
        $this->productos[] = $productos;
    
        return $this;
    }

    /**
     * Remove productos
     *
     * @param \VC\ReservasBundle\Entity\ReservaProducto $productos
     */
    public function removeProducto(\VC\ReservasBundle\Entity\ReservaProducto $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * Set largo
     *
     * @param float $largo
     * @return Reserva
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
     * Set ancho
     *
     * @param float $ancho
     * @return Reserva
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
     * Set alto
     *
     * @param float $alto
     * @return Reserva
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
     * Set status
     *
     * @param \VC\BaseBundle\Entity\Status $status
     * @return Reserva
     */
    public function setStatus(\VC\BaseBundle\Entity\Status $status = null)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return \VC\BaseBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set mailContacto
     *
     * @param string $mailContacto
     * @return Reserva
     */
    public function setMailContacto($mailContacto)
    {
        $this->mailContacto = $mailContacto;
    
        return $this;
    }

    /**
     * Get mailContacto
     *
     * @return string 
     */
    public function getMailContacto()
    {
        return $this->mailContacto;
    }

    /**
     * Set sucursal
     *
     * @param \VC\BaseBundle\Entity\Sucursal $sucursal
     * @return Reserva
     */
    public function setSucursal(\VC\BaseBundle\Entity\Sucursal $sucursal = null)
    {
        $this->sucursal = $sucursal;
    
        return $this;
    }

    /**
     * Get sucursal
     *
     * @return \VC\BaseBundle\Entity\Sucursal 
     */
    public function getSucursal()
    {
        return $this->sucursal;
    }

    /**
     * Set horaString
     *
     * @param string $horaString
     * @return Reserva
     */
    public function setHoraString($horaString)
    {
        $this->horaString = $horaString;
    
        return $this;
    }

    /**
     * Get horaString
     *
     * @return string 
     */
    public function getHoraString()
    {
        return $this->horaString;
    }

    /**
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return Reserva
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;
    
        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return string 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set noPalet
     *
     * @param string $noPalet
     * @return Reserva
     */
    public function setNoPalet($noPalet)
    {
        $this->noPalet = $noPalet;
    
        return $this;
    }

    /**
     * Get noPalet
     *
     * @return string 
     */
    public function getNoPalet()
    {
        return $this->noPalet;
    }

    /**
     * Set notaAnulada
     *
     * @param string $notaAnulada
     * @return Reserva
     */
    public function setNotaAnulada($notaAnulada)
    {
        $this->notaAnulada = $notaAnulada;
    
        return $this;
    }

    /**
     * Get notaAnulada
     *
     * @return string 
     */
    public function getNotaAnulada()
    {
        return $this->notaAnulada;
    }

    /**
     * Set contactoAerolinea
     *
     * @param string $contactoAerolinea
     * @return Reserva
     */
    public function setContactoAerolinea($contactoAerolinea)
    {
        $this->contactoAerolinea = $contactoAerolinea;
    
        return $this;
    }

    /**
     * Get contactoAerolinea
     *
     * @return string 
     */
    public function getContactoAerolinea()
    {
        return $this->contactoAerolinea;
    }

    /**
     * Set contactoAgencia
     *
     * @param string $contactoAgencia
     * @return Reserva
     */
    public function setContactoAgencia($contactoAgencia)
    {
        $this->contactoAgencia = $contactoAgencia;
    
        return $this;
    }

    /**
     * Get contactoAgencia
     *
     * @return string 
     */
    public function getContactoAgencia()
    {
        return $this->contactoAgencia;
    }

    /**
     * Set contactoCliente
     *
     * @param string $contactoCliente
     * @return Reserva
     */
    public function setContactoCliente($contactoCliente)
    {
        $this->contactoCliente = $contactoCliente;
    
        return $this;
    }

    /**
     * Get contactoCliente
     *
     * @return string 
     */
    public function getContactoCliente()
    {
        return $this->contactoCliente;
    }

    /**
     * Add hijas
     *
     * @param \VC\ReservasBundle\Entity\ReservaHijas $hijas
     * @return Reserva
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