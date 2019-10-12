<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblTipoProducto
 *
 * @ORM\Table(name="tbl_tipo_producto")
 * @ORM\Entity
 */
class TblTipoProducto
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TIPO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipo;

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

    public function getIdTipo(): ?int
    {
        return $this->idTipo;
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
