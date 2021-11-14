<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblVentaDetalleProducto
 *
 * @ORM\Table(name="tbl_venta_detalle_producto", indexes={@ORM\Index(name="ID_PRODUCTO_DETALLE", columns={"ID_PRODUCTO_DETALLE"}), @ORM\Index(name="ID_VENTA", columns={"ID_VENTA"})})
 * @ORM\Entity
 */
class TblVentaDetalleProducto
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \TblVenta
     *
     * @ORM\ManyToOne(targetEntity="TblVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VENTA", referencedColumnName="ID_VENTA")
     * })
     */
    private $idVenta;

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
     * @var int
     * @ORM\Column(name="CANTIDAD", type="integer", length=11, nullable=false)
     */
    private $cantidad;



    public function getCantidad(): int
    {
        return $this->cantidad;
    }


    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVenta(): ?TblVenta
    {
        return $this->idVenta;
    }

    public function setIdVenta(TblVenta $idVenta): self
    {
        $this->idVenta = $idVenta;

        return $this;
    }

    public function getIdProductoDetalle(): ?TblProductoDetalle
    {
        return $this->idProductoDetalle;
    }

    public function setIdProductoDetalle(TblProductoDetalle $idProductoDetalle): self
    {
        $this->idProductoDetalle = $idProductoDetalle;

        return $this;
    }


}
