<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuarioEstado
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
     * @var string|null
     *
     * @ORM\Column(name="ESTADO", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    public function getIdEstado(): ?int
    {
        return $this->idEstado;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }


}
