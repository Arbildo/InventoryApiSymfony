<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblVentaCredito
 *
 * @ORM\Table(name="tbl_venta_credito", indexes={@ORM\Index(name="ID_VENTA", columns={"ID_VENTA"})})
 * @ORM\Entity
 */
class TblVentaCredito
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
     * @var string
     *
     * @ORM\Column(name="MONTO", type="decimal", precision=6, scale=2, nullable=false)
     */
    private $monto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PAGO", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $fechaPago = 'current_timestamp()';

    /**
     * @var \TblVenta
     *
     * @ORM\ManyToOne(targetEntity="TblVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_VENTA", referencedColumnName="ID_VENTA")
     * })
     */
    private $idVenta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonto(): ?string
    {
        return $this->monto;
    }

    public function setMonto(string $monto): self
    {
        $this->monto = $monto;

        return $this;
    }

    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fechaPago;
    }

    public function setFechaPago(\DateTimeInterface $fechaPago): self
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    public function getIdVenta(): ?TblVenta
    {
        return $this->idVenta;
    }

    public function setIdVenta(?TblVenta $idVenta): self
    {
        $this->idVenta = $idVenta;

        return $this;
    }


}
