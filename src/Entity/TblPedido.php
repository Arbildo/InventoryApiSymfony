<?php

namespace App\Entity;

use App\Repository\TblProductoEstadoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * TblPedido
 *
 * @ORM\Table(name="tbl_pedido", indexes={@ORM\Index(name="ID_CLIENTE", columns={"ID_CLIENTE"}), @ORM\Index(name="ID_ENCARGADO", columns={"ID_ENCARGADO"})})
 * @ORM\Entity
 */
class TblPedido
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PEDIDO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPedido;


    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false, options={"comment"="4=pendiente,5=completo,6=incompleto,7=anulado,11=atendido,12=atendido fuera de tiempo, 14=incometo fuera de tiempo"})
     */
    private $estado;

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
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ENCARGADO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idEncargado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PEDIDO", type="datetime", nullable=false)
     */
    private $fechaPedido;

    /**
     * @var float
     *
     * @ORM\Column(name="TOTAL", type="float")
     */
    private $total;

    public function getIdPedido(): ?int
    {
        return $this->idPedido;
    }

    public function getFechaPedido(): ?\DateTimeInterface
    {
        return $this->fechaPedido;
    }

    public function setFechaPedido(\DateTimeInterface $fechaPedido): self
    {
        $this->fechaPedido = $fechaPedido;
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

    public function getIdCliente(): ?TblCliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?TblCliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getIdEncargado(): ?TblUsuario
    {
        return $this->idEncargado;
    }

    public function setIdEncargado(?TblUsuario $idEncargado): self
    {
        $this->idEncargado = $idEncargado;

        return $this;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }



}
