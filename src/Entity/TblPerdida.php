<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPerdida
 *
 * @ORM\Table(name="tbl_perdida", indexes={@ORM\Index(name="fk_perdida_estado_id", columns={"ESTADO"}), @ORM\Index(name="ID_DETALLE_PRODUCTO", columns={"ID_DETALLE_PRODUCTO"})})
 * @ORM\Entity
 */
class TblPerdida
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PERDIDA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPerdida;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CODIGO", type="string", length=50, nullable=true)
     */
    private $codigo;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="text", length=65535, nullable=false)
     */
    private $descripcion;

    /**
     * @var \TblPerdidaEstado
     *
     * @ORM\ManyToOne(targetEntity="TblPerdidaEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ESTADO", referencedColumnName="id")
     * })
     */
    private $estado;

    /**
     * @var \TblProductoDetalle
     *
     * @ORM\ManyToOne(targetEntity="TblProductoDetalle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DETALLE_PRODUCTO", referencedColumnName="ID_PRODUCTO_DETALLE")
     * })
     */
    private $idDetalleProducto;

    public function getIdPerdida(): ?int
    {
        return $this->idPerdida;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getFecha(): String
    {
        return date("F jS, Y, H:i", $this->fecha->getTimestamp());
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEstado(): ?TblPerdidaEstado
    {
        return $this->estado;
    }

    public function setEstado(?TblPerdidaEstado $estado): self
    {
        $this->estado = $estado;

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
