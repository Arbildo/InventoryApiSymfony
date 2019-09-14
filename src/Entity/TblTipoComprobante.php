<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblTipoComprobante
 *
 * @ORM\Table(name="tbl_tipo_comprobante")
 * @ORM\Entity(repositoryClass="App\Repository\TblTipoComprobanteRepository")
 */
class TblTipoComprobante
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_TIPO_COMPROBANTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoComprobante;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE_TIPO", type="string", length=200, nullable=false)
     */
    private $nombreTipo;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    public function getIdTipoComprobante(): ?int
    {
        return $this->idTipoComprobante;
    }

    public function getNombreTipo(): ?string
    {
        return $this->nombreTipo;
    }

    public function setNombreTipo(string $nombreTipo): self
    {
        $this->nombreTipo = $nombreTipo;

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
