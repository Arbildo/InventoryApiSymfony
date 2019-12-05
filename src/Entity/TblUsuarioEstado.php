<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuario
 *
 * @ORM\Table(name="tbl_usuario_estado")
 * @ORM\Entity
 */
class TblUsuarioEstado
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
     * @ORM\Column(name="ESTADO", type="string", nullable=false)
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
     * @param int $estado
     */
    public function setEstado(int $estado): void
    {
        $this->estado = $estado;
    }



}
