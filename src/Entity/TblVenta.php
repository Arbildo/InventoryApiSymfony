<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * TblVenta
 * @ORM\Entity(repositoryClass=TblVentaRepository::class)
 * @ORM\Table(name="tbl_venta", indexes={@ORM\Index(name="ID_CLIENTE", columns={"ID_CLIENTE"}), @ORM\Index(name="ESTADO", columns={"ESTADO"}), @ORM\Index(name="ID_USUARIO", columns={"ID_USUARIO"})})
 * @ORM\Entity
 */
class TblVenta
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_VENTA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_VENTA", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $fechaVenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PAGO", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $fechaPago;

    /**
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuario;

    /**
     * @var \TblCliente
     *
     * @ORM\ManyToOne(targetEntity="TblCliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CLIENTE", referencedColumnName="ID_CLIENTE")
     * })
     */
    private $idCliente;

    /**
     * @var TblVentaEstado
     *
     * @ORM\ManyToOne(targetEntity="TblVentaEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ESTADO", referencedColumnName="ID")
     * })
     */
    private $estado;


    public function getIdVenta(): ?int
    {
        return $this->idVenta;
    }

    public function getFechaVenta(): ?\DateTimeInterface
    {
        return $this->fechaVenta;
    }

    public function setFechaVenta($fechaVenta): self
    {
        $this->fechaVenta = $fechaVenta;

        return $this;
    }

    public function getFechaPago(): ?\DateTimeInterface
    {
        return $this->fechaPago;
    }

    public function setFechaPago($fechaPago): self
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    public function getIdUsuario(): ?TblUsuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?TblUsuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdCliente(): ?TblCliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?TblCliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getEstado(): ?TblVentaEstado
    {
        return $this->estado;
    }

    public function setEstado(?TblVentaEstado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }


}
