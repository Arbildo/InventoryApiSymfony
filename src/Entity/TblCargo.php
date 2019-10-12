<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblCargo
 *
 * @ORM\Table(name="tbl_cargo")
 * @ORM\Entity
 */
class TblCargo
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CARGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCargo;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    public function getIdCargo(): ?int
    {
        return $this->idCargo;
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
