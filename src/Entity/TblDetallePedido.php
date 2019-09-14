<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDetallePedido
 *
 * @ORM\Table(name="tbl_detalle_pedido", indexes={@ORM\Index(name="ID_PRODUCTO_DETALLE", columns={"ID_PRODUCTO_DETALLE"}), @ORM\Index(name="ID_PEDIDO", columns={"ID_PEDIDO"}), @ORM\Index(name="ID_LOTE", columns={"ID_LOTE"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblDetallePedidoRepository")
 */
class TblDetallePedido
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DETALLE_PEDIDO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetallePedido;

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
     * @var \TblPedido
     *
     * @ORM\ManyToOne(targetEntity="TblPedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PEDIDO", referencedColumnName="ID_PEDIDO")
     * })
     */
    private $idPedido;

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
     * @var \TblLote
     *
     * @ORM\ManyToOne(targetEntity="TblLote")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_LOTE", referencedColumnName="ID_LOTE")
     * })
     */
    private $idLote;

    public function getIdDetallePedido(): ?int
    {
        return $this->idDetallePedido;
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

    public function getIdPedido(): ?TblPedido
    {
        return $this->idPedido;
    }

    public function setIdPedido(?TblPedido $idPedido): self
    {
        $this->idPedido = $idPedido;

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
