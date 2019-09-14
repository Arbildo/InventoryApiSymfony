<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblComprobanteCompra
 *
 * @ORM\Table(name="tbl_comprobante_compra", indexes={@ORM\Index(name="ID_TIPO_COMPROBANTE", columns={"ID_TIPO_COMPROBANTE"}), @ORM\Index(name="ID_PROVEEDOR", columns={"ID_PROVEEDOR"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblComprobanteCompraRepository")
 */
class TblComprobanteCompra
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_COMPROBANTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComprobante;

    /**
     * @var string
     *
     * @ORM\Column(name="SERIE", type="string", length=200, nullable=false)
     */
    private $serie;

    /**
     * @var string
     *
     * @ORM\Column(name="NUMERACION", type="string", length=200, nullable=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblProveedor
     *
     * @ORM\ManyToOne(targetEntity="TblProveedor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PROVEEDOR", referencedColumnName="ID_PROVEEDOR")
     * })
     */
    private $idProveedor;

    /**
     * @var \TblTipoComprobante
     *
     * @ORM\ManyToOne(targetEntity="TblTipoComprobante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_COMPROBANTE", referencedColumnName="ID_TIPO_COMPROBANTE")
     * })
     */
    private $idTipoComprobante;

    public function getIdComprobante(): ?int
    {
        return $this->idComprobante;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getNumeracion(): ?string
    {
        return $this->numeracion;
    }

    public function setNumeracion(string $numeracion): self
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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getIdProveedor(): ?TblProveedor
    {
        return $this->idProveedor;
    }

    public function setIdProveedor(?TblProveedor $idProveedor): self
    {
        $this->idProveedor = $idProveedor;

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


}
