<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblGuiaSalida
 *
 * @ORM\Table(name="tbl_guia_salida", indexes={@ORM\Index(name="ID_CLIENTE", columns={"ID_CLIENTE"}), @ORM\Index(name="ID_EMPRESA_TRANSPORTE", columns={"ID_EMPRESA_TRANSPORTE"}), @ORM\Index(name="ID_UNIDAD_TRANSPORTE", columns={"ID_UNIDAD_TRANSPORTE"})})
 * @ORM\Entity
 */
class TblGuiaSalida
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_GUIA_SALIDA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGuiaSalida;

    /**
     * @var int
     *
     * @ORM\Column(name="NUM_SERIE", type="integer", nullable=false)
     */
    private $numSerie;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMERACION", type="integer", nullable=false)
     */
    private $numeracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_SALIDA", type="date", nullable=false)
     */
    private $fechaSalida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_LLEGADA", type="date", nullable=false)
     */
    private $fechaLlegada;

    /**
     * @var string
     *
     * @ORM\Column(name="TRANSPORTISTA", type="string", length=200, nullable=false)
     */
    private $transportista;

    /**
     * @var string
     *
     * @ORM\Column(name="LICENCIA", type="string", length=200, nullable=false)
     */
    private $licencia;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="PUNTO_LLEGADA", type="string", length=200, nullable=false)
     */
    private $puntoLlegada;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_ATENDIDO", type="integer", nullable=false)
     */
    private $idAtendido;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblEmpresaTransporte
     *
     * @ORM\ManyToOne(targetEntity="TblEmpresaTransporte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EMPRESA_TRANSPORTE", referencedColumnName="ID_EMPRESA")
     * })
     */
    private $idEmpresaTransporte;

    /**
     * @var \TblUnidadTransporte
     *
     * @ORM\ManyToOne(targetEntity="TblUnidadTransporte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_UNIDAD_TRANSPORTE", referencedColumnName="ID_UNIDAD")
     * })
     */
    private $idUnidadTransporte;

    /**
     * @var \TblCliente
     *
     * @ORM\ManyToOne(targetEntity="TblCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLIENTE", referencedColumnName="ID_CLIENTE")
     * })
     */
    private $idCliente;

    public function getIdGuiaSalida(): ?int
    {
        return $this->idGuiaSalida;
    }

    public function getNumSerie(): ?int
    {
        return $this->numSerie;
    }

    public function setNumSerie(int $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getNumeracion(): ?int
    {
        return $this->numeracion;
    }

    public function setNumeracion(int $numeracion): self
    {
        $this->numeracion = $numeracion;

        return $this;
    }

    public function getFechaSalida(): ?\DateTimeInterface
    {
        return $this->fechaSalida;
    }

    public function setFechaSalida(\DateTimeInterface $fechaSalida): self
    {
        $this->fechaSalida = $fechaSalida;

        return $this;
    }

    public function getFechaLlegada(): ?\DateTimeInterface
    {
        return $this->fechaLlegada;
    }

    public function setFechaLlegada(\DateTimeInterface $fechaLlegada): self
    {
        $this->fechaLlegada = $fechaLlegada;

        return $this;
    }

    public function getTransportista(): ?string
    {
        return $this->transportista;
    }

    public function setTransportista(string $transportista): self
    {
        $this->transportista = $transportista;

        return $this;
    }

    public function getLicencia(): ?string
    {
        return $this->licencia;
    }

    public function setLicencia(string $licencia): self
    {
        $this->licencia = $licencia;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPuntoLlegada(): ?string
    {
        return $this->puntoLlegada;
    }

    public function setPuntoLlegada(string $puntoLlegada): self
    {
        $this->puntoLlegada = $puntoLlegada;

        return $this;
    }

    public function getIdAtendido(): ?int
    {
        return $this->idAtendido;
    }

    public function setIdAtendido(int $idAtendido): self
    {
        $this->idAtendido = $idAtendido;

        return $this;
    }

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdEmpresaTransporte(): ?TblEmpresaTransporte
    {
        return $this->idEmpresaTransporte;
    }

    public function setIdEmpresaTransporte(?TblEmpresaTransporte $idEmpresaTransporte): self
    {
        $this->idEmpresaTransporte = $idEmpresaTransporte;

        return $this;
    }

    public function getIdUnidadTransporte(): ?TblUnidadTransporte
    {
        return $this->idUnidadTransporte;
    }

    public function setIdUnidadTransporte(?TblUnidadTransporte $idUnidadTransporte): self
    {
        $this->idUnidadTransporte = $idUnidadTransporte;

        return $this;
    }

    public function getIdCliente(): ?TblCliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?TblCliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }


}
