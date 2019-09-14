<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDetalleComprobanteCompra
 *
 * @ORM\Table(name="tbl_detalle_comprobante_compra", indexes={@ORM\Index(name="ID_LOTE", columns={"ID_LOTE"}), @ORM\Index(name="ID_COMPROBANTE", columns={"ID_COMPROBANTE"}), @ORM\Index(name="ID_PRODUCTO_DETALLE", columns={"ID_PRODUCTO_DETALLE"}), @ORM\Index(name="ID_ORDEN", columns={"ID_ORDEN"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblDetalleComprobanteCompraRepository")
 */
class TblDetalleComprobanteCompra
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DETALLE_COMPROBANTE_COMPRA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalleComprobanteCompra;

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
     * @var \TblProductoDetalle
     *
     * @ORM\ManyToOne(targetEntity="TblProductoDetalle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PRODUCTO_DETALLE", referencedColumnName="ID_PRODUCTO_DETALLE")
     * })
     */
    private $idProductoDetalle;

    /**
     * @var \TblComprobanteCompra
     *
     * @ORM\ManyToOne(targetEntity="TblComprobanteCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COMPROBANTE", referencedColumnName="ID_COMPROBANTE")
     * })
     */
    private $idComprobante;

    /**
     * @var \TblOrdenCompra
     *
     * @ORM\ManyToOne(targetEntity="TblOrdenCompra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ORDEN", referencedColumnName="ID_ORDEN_COMPRA")
     * })
     */
    private $idOrden;

    /**
     * @var \TblLote
     *
     * @ORM\ManyToOne(targetEntity="TblLote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_LOTE", referencedColumnName="ID_LOTE")
     * })
     */
    private $idLote;

    public function getIdDetalleComprobanteCompra(): ?int
    {
        return $this->idDetalleComprobanteCompra;
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

    public function getIdProductoDetalle(): ?TblProductoDetalle
    {
        return $this->idProductoDetalle;
    }

    public function setIdProductoDetalle(?TblProductoDetalle $idProductoDetalle): self
    {
        $this->idProductoDetalle = $idProductoDetalle;

        return $this;
    }

    public function getIdComprobante(): ?TblComprobanteCompra
    {
        return $this->idComprobante;
    }

    public function setIdComprobante(?TblComprobanteCompra $idComprobante): self
    {
        $this->idComprobante = $idComprobante;

        return $this;
    }

    public function getIdOrden(): ?TblOrdenCompra
    {
        return $this->idOrden;
    }

    public function setIdOrden(?TblOrdenCompra $idOrden): self
    {
        $this->idOrden = $idOrden;

        return $this;
    }

    public function getIdLote(): ?TblLote
    {
        return $this->idLote;
    }

    public function setIdLote(?TblLote $idLote): self
    {
        $this->idLote = $idLote;

        return $this;
    }


}
