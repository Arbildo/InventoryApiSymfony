<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDetalleNotaCredito
 *
 * @ORM\Table(name="tbl_detalle_nota_credito", indexes={@ORM\Index(name="ID_NOTA_CREDITO", columns={"ID_NOTA_CREDITO"}), @ORM\Index(name="ID_DETALLE_COMPROBANTE_VENTA", columns={"ID_DETALLE_COMPROBANTE_VENTA"}), @ORM\Index(name="ID_DETALLE_PRODUCTO", columns={"ID_DETALLE_PRODUCTO"})})
 * @ORM\Entity
 */
class TblDetalleNotaCredito
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DETALLE_NOTA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalleNota;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="PRECIO", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $precio;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblDetalleComprobanteVenta
     *
     * @ORM\ManyToOne(targetEntity="TblDetalleComprobanteVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DETALLE_COMPROBANTE_VENTA", referencedColumnName="ID_DETALLE_COMPROBANTE_VENTA")
     * })
     */
    private $idDetalleComprobanteVenta;

    /**
     * @var \TblNotaCredito
     *
     * @ORM\ManyToOne(targetEntity="TblNotaCredito")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NOTA_CREDITO", referencedColumnName="ID_NOTA_CREDITO")
     * })
     */
    private $idNotaCredito;

    /**
     * @var \TblProductoDetalle
     *
     * @ORM\ManyToOne(targetEntity="TblProductoDetalle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DETALLE_PRODUCTO", referencedColumnName="ID_PRODUCTO_DETALLE")
     * })
     */
    private $idDetalleProducto;

    public function getIdDetalleNota(): ?int
    {
        return $this->idDetalleNota;
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

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): self
    {
        $this->precio = $precio;

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

    public function getIdDetalleComprobanteVenta(): ?TblDetalleComprobanteVenta
    {
        return $this->idDetalleComprobanteVenta;
    }

    public function setIdDetalleComprobanteVenta(?TblDetalleComprobanteVenta $idDetalleComprobanteVenta): self
    {
        $this->idDetalleComprobanteVenta = $idDetalleComprobanteVenta;

        return $this;
    }

    public function getIdNotaCredito(): ?TblNotaCredito
    {
        return $this->idNotaCredito;
    }

    public function setIdNotaCredito(?TblNotaCredito $idNotaCredito): self
    {
        $this->idNotaCredito = $idNotaCredito;

        return $this;
    }

    public function getIdDetalleProducto(): ?TblProductoDetalle
    {
        return $this->idDetalleProducto;
    }

    public function setIdDetalleProducto(?TblProductoDetalle $idDetalleProducto): self
    {
        $this->idDetalleProducto = $idDetalleProducto;

        return $this;
    }


}
