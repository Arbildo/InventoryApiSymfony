<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblComprobanteVenta
 *
 * @ORM\Table(name="tbl_comprobante_venta", indexes={@ORM\Index(name="ID_TIPO_COMPROBANTE", columns={"ID_TIPO_COMPROBANTE"}), @ORM\Index(name="ID_CLIENTE", columns={"ID_CLIENTE"}), @ORM\Index(name="ID_USUARIO", columns={"ID_USUARIO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblComprobanteVentaRepository")
 */
class TblComprobanteVenta
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_COMPROBANTE_VENTA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComprobanteVenta;

    /**
     * @var int
     *
     * @ORM\Column(name="TIPO_VENTA", type="integer", nullable=false, options={"comment"="1=DIRECTA,2=PEDIDO"})
     */
    private $tipoVenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="SERIE", type="integer", nullable=false)
     */
    private $serie;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMERACION", type="integer", nullable=false)
     */
    private $numeracion;

    /**
     * @var string
     *
     * @ORM\Column(name="SUBTOTAL", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $subtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="DSCT", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $dsct;

    /**
     * @var string
     *
     * @ORM\Column(name="IGV", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $igv;

    /**
     * @var string
     *
     * @ORM\Column(name="TOTAL", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $total;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false, options={"comment"="7=ANULADO,8=ACTIVO-SIN IMPRIMIR,9=ACTIVO-IMPRESO"})
     */
    private $estado;

    /**
     * @var \TblTipoComprobante
     *
     * @ORM\ManyToOne(targetEntity="TblTipoComprobante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_COMPROBANTE", referencedColumnName="ID_TIPO_COMPROBANTE")
     * })
     */
    private $idTipoComprobante;

    /**
     * @var \TblCliente
     *
     * @ORM\ManyToOne(targetEntity="TblCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLIENTE", referencedColumnName="ID_CLIENTE")
     * })
     */
    private $idCliente;

    /**
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuario;

    public function getIdComprobanteVenta(): ?int
    {
        return $this->idComprobanteVenta;
    }

    public function getTipoVenta(): ?int
    {
        return $this->tipoVenta;
    }

    public function setTipoVenta(int $tipoVenta): self
    {
        $this->tipoVenta = $tipoVenta;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;

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

    public function getSubtotal(): ?string
    {
        return $this->subtotal;
    }

    public function setSubtotal(string $subtotal): self
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getDsct(): ?string
    {
        return $this->dsct;
    }

    public function setDsct(string $dsct): self
    {
        $this->dsct = $dsct;

        return $this;
    }

    public function getIgv(): ?string
    {
        return $this->igv;
    }

    public function setIgv(string $igv): self
    {
        $this->igv = $igv;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdTipoComprobante(): ?TblTipoComprobante
    {
        return $this->idTipoComprobante;
    }

    public function setIdTipoComprobante(?TblTipoComprobante $idTipoComprobante): self
    {
        $this->idTipoComprobante = $idTipoComprobante;

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

    public function getIdUsuario(): ?TblUsuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?TblUsuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


}
