<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblOrdenCompra
 *
 * @ORM\Table(name="tbl_orden_compra", indexes={@ORM\Index(name="id_proveedor", columns={"ID_PROVEEDOR"})})
 * @ORM\Entity
 */
class TblOrdenCompra
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ORDEN_COMPRA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOrdenCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="date", nullable=false)
     */
    private $fecha;

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

    public function getIdOrdenCompra(): ?int
    {
        return $this->idOrdenCompra;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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


}
