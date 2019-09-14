<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblAtendido
 *
 * @ORM\Table(name="tbl_atendido", indexes={@ORM\Index(name="ID_PEDIDO", columns={"ID_PEDIDO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblAtendidoRepository")
 */
class TblAtendido
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ATENDIDO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAtendido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO_GUIA", type="integer", nullable=false, options={"comment"="16=GUIA ATENDIDA,17=GUIA SIN ATENDER"})
     */
    private $estadoGuia;

    /**
     * @var \TblPedido
     *
     * @ORM\ManyToOne(targetEntity="TblPedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_PEDIDO", referencedColumnName="ID_PEDIDO")
     * })
     */
    private $idPedido;

    public function getIdAtendido(): ?int
    {
        return $this->idAtendido;
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

    public function getEstado(): ?int
    {
        return $this->estado;
    }

    public function setEstado(int $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getEstadoGuia(): ?int
    {
        return $this->estadoGuia;
    }

    public function setEstadoGuia(int $estadoGuia): self
    {
        $this->estadoGuia = $estadoGuia;

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


}
