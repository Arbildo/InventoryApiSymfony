<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProductoDetalle
 *
 * @ORM\Table(name="tbl_producto_detalle", indexes={@ORM\Index(name="ID_TALLA", columns={"ID_TALLA"}), @ORM\Index(name="id_producto", columns={"ID_PRODUCTO"}), @ORM\Index(name="ID_LOTE", columns={"ID_LOTE"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblProductoDetalleRepository")
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
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblProducto
     *
     * @ORM\ManyToOne(targetEntity="TblProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PRODUCTO", referencedColumnName="ID_PRODUCTO")
     * })
     */
    private $idProducto;

    /**
     * @var \TblTalla
     *
     * @ORM\ManyToOne(targetEntity="TblTalla")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TALLA", referencedColumnName="ID_TALLA")
     * })
     */
    private $idTalla;

    /**
     * @var \TblLote
     *
     * @ORM\ManyToOne(targetEntity="TblLote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_LOTE", referencedColumnName="ID_LOTE")
     * })
     */
    private $idLote;

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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
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

    public function getIdTalla(): ?TblTalla
    {
        return $this->idTalla;
    }

    public function setIdTalla(?TblTalla $idTalla): self
    {
        $this->idTalla = $idTalla;

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
