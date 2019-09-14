<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblNotaCredito
 *
 * @ORM\Table(name="tbl_nota_credito", indexes={@ORM\Index(name="ID_COMPROBANTE_VENTA", columns={"ID_COMPROBANTE_VENTA"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblNotaCreditoRepository")
 */
class TblNotaCredito
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_NOTA_CREDITO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotaCredito;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTIVO", type="text", length=65535, nullable=false)
     */
    private $motivo;

    /**
     * @var int
     *
     * @ORM\Column(name="NUM_SERIE", type="integer", nullable=false)
     */
    private $numSerie;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMERACION", type="integer", nullable=false)
     */
    private $numeracion;

    /**
     * @var string
     *
     * @ORM\Column(name="SUBTOTAL", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $subtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="IGV", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $igv;

    /**
     * @var string
     *
     * @ORM\Column(name="TOTAL", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $total;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false, options={"comment"="7=ANULADO,8=ACTIVO-SIN IMPRIMIR,9=ACTIVO-IMPRESO"})
     */
    private $estado;

    /**
     * @var \TblComprobanteVenta
     *
     * @ORM\ManyToOne(targetEntity="TblComprobanteVenta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_COMPROBANTE_VENTA", referencedColumnName="ID_COMPROBANTE_VENTA")
     * })
     */
    private $idComprobanteVenta;

    public function getIdNotaCredito(): ?int
    {
        return $this->idNotaCredito;
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

    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    public function setMotivo(string $motivo): self
    {
        $this->motivo = $motivo;

        return $this;
    }

    public function getNumSerie(): ?int
    {
        return $this->numSerie;
    }

    public function setNumSerie(int $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getNumeracion(): ?int
    {
        return $this->numeracion;
    }

    public function setNumeracion(int $numeracion): self
    {
        $this->numeracion = $numeracion;

        return $this;
    }

    public function getSubtotal(): ?string
    {
        return $this->subtotal;
    }

    public function setSubtotal(string $subtotal): self
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getIgv(): ?string
    {
        return $this->igv;
    }

    public function setIgv(string $igv): self
    {
        $this->igv = $igv;

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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdComprobanteVenta(): ?TblComprobanteVenta
    {
        return $this->idComprobanteVenta;
    }

    public function setIdComprobanteVenta(?TblComprobanteVenta $idComprobanteVenta): self
    {
        $this->idComprobanteVenta = $idComprobanteVenta;

        return $this;
    }


}
