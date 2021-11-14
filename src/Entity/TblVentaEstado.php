<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblVentaEstado
 *
 * @ORM\Table(name="tbl_venta_estado")
 * @ORM\Entity
 */
class TblVentaEstado
{
    /**
     * @var bool
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ESTADO", type="string", length=15, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    public function getId(): ?int
    {
        return $this->id;
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
