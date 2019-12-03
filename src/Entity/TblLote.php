<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblLote
 *
 * @ORM\Table(name="tbl_lote", indexes={@ORM\Index(name="fk_lote_estado_id", columns={"ESTADO"})})
 * @ORM\Entity
 */
class TblLote
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_LOTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLote;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_VENCIMIENTO", type="date", nullable=true)
     */
    private $fechaVencimiento;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="FECHA_CREACION", type="datetime", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var \TblLoteEstado
     *
     * @ORM\ManyToOne(targetEntity="TblLoteEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ESTADO", referencedColumnName="id")
     * })
     */
    private $estado;

    public function getIdLote(): ?int
    {
        return $this->idLote;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaVencimiento(): String
    {
        if (is_null($this->fechaVencimiento)){
            return "";
        }
        return date("Y-m-d", $this->fechaVencimiento->getTimestamp());
    }

    public function setFechaVencimiento(?\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }


    public function getFechaCreacion(): String
    {
        if (is_null($this->fechaCreacion)){
            return "";
        }
        return date("Y-m-d", $this->fechaCreacion->getTimestamp());
    }

    public function setFechaCreacion(?\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getEstado(): ?TblLoteEstado
    {
        return $this->estado;
    }

    public function setEstado(?TblLoteEstado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }


}
