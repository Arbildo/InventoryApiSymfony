<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProductoEstado
 *
 * @ORM\Table(name="tbl_producto_estado")
 * @ORM\Entity
 */
class TblProductoEstado
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_ESTADO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=200, nullable=false)
     */
    private $estado;

    /**
     * @return int
     */
    public function getIdEstado(): int
    {
        return $this->idEstado;
    }

    /**
     * @param int $idEstado
     */
    public function setIdEstado(int $idEstado): void
    {
        $this->idEstado = $idEstado;
    }

    /**
     * @return string
     */
    public function getEstado(): string
    {
        return $this->estado;
    }

    /**
     * @param string $estado
     */
    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }


}
