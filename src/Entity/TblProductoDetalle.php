<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProductoDetalle
 *
 * @ORM\Table(name="tbl_producto_detalle", indexes={@ORM\Index(name="fk_estado_id", columns={"estado"}), @ORM\Index(name="id_producto", columns={"ID_PRODUCTO"})})
 * @ORM\Entity
 */
class TblProductoDetalle
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PRODUCTO_DETALLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProductoDetalle;

    /**
     * @var int
     *
     * @ORM\Column(name="STOCK_INICIAL", type="integer", nullable=false)
     */
    private $stockInicial;

    /**
     * @var int
     *
     * @ORM\Column(name="STOCK_MINIMO", type="integer", nullable=false)
     */
    private $stockMinimo;

    /**
     * @var string
     *
     * @ORM\Column(name="PRECIO", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $precio;

    /**
     * @var int|null
     *
     * @ORM\Column(name="STOCK_ACTUAL", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $stockActual = 'NULL';

    /**
     * @var TblProductoDetalleEstado
     *
     * @ORM\ManyToOne(targetEntity="TblProductoDetalleEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estado", referencedColumnName="ID")
     * })
     */
    private $estado;

    /**
     * @var TblProducto
     *
     * @ORM\ManyToOne(targetEntity="TblProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PRODUCTO", referencedColumnName="ID_PRODUCTO")
     * })
     */
    private $idProducto;

    public function getIdProductoDetalle(): ?int
    {
        return $this->idProductoDetalle;
    }

    public function getStockInicial(): ?int
    {
        return $this->stockInicial;
    }

    public function setStockInicial(int $stockInicial): self
    {
        $this->stockInicial = $stockInicial;

        return $this;
    }

    public function getStockMinimo(): ?int
    {
        return $this->stockMinimo;
    }

    public function setStockMinimo(int $stockMinimo): self
    {
        $this->stockMinimo = $stockMinimo;

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

    public function getStockActual(): ?int
    {
        return $this->stockActual;
    }

    public function setStockActual(?int $stockActual): self
    {
        $this->stockActual = $stockActual;

        return $this;
    }

    public function getEstado(): ?TblProductoDetalleEstado
    {
        return $this->estado;
    }

    public function setEstado(?TblProductoDetalleEstado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdProducto(): ?TblProducto
    {
        return $this->idProducto;
    }

    public function setIdProducto(?TblProducto $idProducto): self
    {
        $this->idProducto = $idProducto;

        return $this;
    }


}
