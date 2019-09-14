<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblTipoDocumento
 *
 * @ORM\Table(name="tbl_tipo_documento")
 * @ORM\Entity(repositoryClass="App\Repository\TblTipoDocumentoRepository")
 */
class TblTipoDocumento
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
     * @ORM\Column(name="TIPO", type="string", length=200, nullable=false)
     */
    private $tipo;

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

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

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
