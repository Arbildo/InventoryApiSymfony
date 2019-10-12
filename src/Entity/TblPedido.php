<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblPedido
 *
 * @ORM\Table(name="tbl_pedido", indexes={@ORM\Index(name="ID_USUARIO_ASIGNADO", columns={"ID_USUARIO_ASIGNADO"}), @ORM\Index(name="ID_ENCARGADO", columns={"ID_ENCARGADO"}), @ORM\Index(name="ID_CLIENTE", columns={"ID_CLIENTE"})})
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
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_PEDIDO", type="date", nullable=false)
     */
    private $fechaPedido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_PEDIDO", type="time", nullable=false)
     */
    private $horaPedido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_ENTREGA", type="date", nullable=false)
     */
    private $fechaEntrega;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_ATENCION", type="date", nullable=false)
     */
    private $fechaAtencion;

    /**
     * @var string
     *
     * @ORM\Column(name="SUBTOTAL", type="decimal", precision=12, scale=2, nullable=false)
     */
    private $subtotal;

    /**
     * @var int
     *
     * @ORM\Column(name="CANTIDAD", type="integer", nullable=false)
     */
    private $cantidad;

    /**
     * @var int
     *
     * @ORM\Column(name="FINALIZADO", type="integer", nullable=false, options={"comment"="0=SIN FINALIZAR,1=FINALIZADO"})
     */
    private $finalizado;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false, options={"comment"="4=pendiente,5=completo,6=incompleto,7=anulado,11=atendido,12=atendido fuera de tiempo, 14=incometo fuera de tiempo"})
     */
    private $estado;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO_COMPROBANTE", type="integer", nullable=false, options={"comment"="4=pendiente,5=completo,6=incompleto"})
     */
    private $estadoComprobante;

    /**
     * @var \TblUsuario
     *
     * @ORM\ManyToOne(targetEntity="TblUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO_ASIGNADO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuarioAsignado;

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

    public function getIdPedido(): ?int
    {
        return $this->idPedido;
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

    public function getFechaPedido(): ?\DateTimeInterface
    {
        return $this->fechaPedido;
    }

    public function setFechaPedido(\DateTimeInterface $fechaPedido): self
    {
        $this->fechaPedido = $fechaPedido;

        return $this;
    }

    public function getHoraPedido(): ?\DateTimeInterface
    {
        return $this->horaPedido;
    }

    public function setHoraPedido(\DateTimeInterface $horaPedido): self
    {
        $this->horaPedido = $horaPedido;

        return $this;
    }

    public function getFechaEntrega(): ?\DateTimeInterface
    {
        return $this->fechaEntrega;
    }

    public function setFechaEntrega(\DateTimeInterface $fechaEntrega): self
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    public function getFechaAtencion(): ?\DateTimeInterface
    {
        return $this->fechaAtencion;
    }

    public function setFechaAtencion(\DateTimeInterface $fechaAtencion): self
    {
        $this->fechaAtencion = $fechaAtencion;

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

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getFinalizado(): ?int
    {
        return $this->finalizado;
    }

    public function setFinalizado(int $finalizado): self
    {
        $this->finalizado = $finalizado;

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

    public function getEstadoComprobante(): ?int
    {
        return $this->estadoComprobante;
    }

    public function setEstadoComprobante(int $estadoComprobante): self
    {
        $this->estadoComprobante = $estadoComprobante;

        return $this;
    }

    public function getIdUsuarioAsignado(): ?TblUsuario
    {
        return $this->idUsuarioAsignado;
    }

    public function setIdUsuarioAsignado(?TblUsuario $idUsuarioAsignado): self
    {
        $this->idUsuarioAsignado = $idUsuarioAsignado;

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


}
