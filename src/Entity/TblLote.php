<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblLote
 *
 * @ORM\Table(name="tbl_lote")
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
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_VENCIMIENTO", type="date")
     */
    private $fechaVencimiento;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
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

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

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


}
