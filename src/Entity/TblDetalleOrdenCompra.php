<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDetalleOrdenCompra
 *
 * @ORM\Table(name="tbl_detalle_orden_compra", indexes={@ORM\Index(name="id_producto_detalle", columns={"ID_PRODUCTO_DETALLE"}), @ORM\Index(name="id_orden", columns={"ID_ORDEN"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblDetalleOrdenCompraRepository")
 */
class TblDetalleOrdenCompra
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DETALLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="PRECIO", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $precio;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

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
     * @var \TblProductoDetalle
     *
     * @ORM\ManyToOne(targetEntity="TblProductoDetalle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PRODUCTO_DETALLE", referencedColumnName="ID_PRODUCTO_DETALLE")
     * })
     */
    private $idProductoDetalle;

    public function getIdDetalle(): ?int
    {
        return $this->idDetalle;
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

    public function getIdOrden(): ?TblOrdenCompra
    {
        return $this->idOrden;
    }

    public function setIdOrden(?TblOrdenCompra $idOrden): self
    {
        $this->idOrden = $idOrden;

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


}
