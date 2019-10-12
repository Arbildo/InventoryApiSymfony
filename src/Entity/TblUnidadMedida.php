<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUnidadMedida
 *
 * @ORM\Table(name="tbl_unidad_medida")
 * @ORM\Entity
 */
class TblUnidadMedida
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_UNIDAD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUnidad;

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

    public function getIdUnidad(): ?int
    {
        return $this->idUnidad;
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
