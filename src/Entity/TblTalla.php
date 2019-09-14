<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblTalla
 *
 * @ORM\Table(name="tbl_talla")
 * @ORM\Entity(repositoryClass="App\Repository\TblTallaRepository")
 */
class TblTalla
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TALLA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTalla;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE_TALLA", type="string", length=200, nullable=false)
     */
    private $nombreTalla;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    public function getIdTalla(): ?int
    {
        return $this->idTalla;
    }

    public function getNombreTalla(): ?string
    {
        return $this->nombreTalla;
    }

    public function setNombreTalla(string $nombreTalla): self
    {
        $this->nombreTalla = $nombreTalla;

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
