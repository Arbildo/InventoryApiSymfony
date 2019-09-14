<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblDetalleAtendido
 *
 * @ORM\Table(name="tbl_detalle_atendido", indexes={@ORM\Index(name="ID_DETALLE_COMPROBANTE_VENTA", columns={"ID_DETALLE_PEDIDO"}), @ORM\Index(name="ID_ATENDIDO", columns={"ID_ATENDIDO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblDetalleAtendidoRepository")
 */
class TblDetalleAtendido
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_DETALLE_ATENDIDO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDetalleAtendido;

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
     * @var \TblAtendido
     *
     * @ORM\ManyToOne(targetEntity="TblAtendido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ATENDIDO", referencedColumnName="ID_ATENDIDO")
     * })
     */
    private $idAtendido;

    /**
     * @var \TblDetallePedido
     *
     * @ORM\ManyToOne(targetEntity="TblDetallePedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_DETALLE_PEDIDO", referencedColumnName="ID_DETALLE_PEDIDO")
     * })
     */
    private $idDetallePedido;

    public function getIdDetalleAtendido(): ?int
    {
        return $this->idDetalleAtendido;
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

    public function getIdAtendido(): ?TblAtendido
    {
        return $this->idAtendido;
    }

    public function setIdAtendido(?TblAtendido $idAtendido): self
    {
        $this->idAtendido = $idAtendido;

        return $this;
    }

    public function getIdDetallePedido(): ?TblDetallePedido
    {
        return $this->idDetallePedido;
    }

    public function setIdDetallePedido(?TblDetallePedido $idDetallePedido): self
    {
        $this->idDetallePedido = $idDetallePedido;

        return $this;
    }


}
