<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblEmpresaTransporte
 *
 * @ORM\Table(name="tbl_empresa_transporte")
 * @ORM\Entity
 */
class TblEmpresaTransporte
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_EMPRESA", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEmpresa;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="RUC", type="string", length=200, nullable=false)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="RAZON_SOCIAL", type="string", length=200, nullable=false)
     */
    private $razonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="DIRECCION", type="string", length=200, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEFONO", type="string", length=200, nullable=false)
     */
    private $telefono;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    public function getIdEmpresa(): ?int
    {
        return $this->idEmpresa;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getRuc(): ?string
    {
        return $this->ruc;
    }

    public function setRuc(string $ruc): self
    {
        $this->ruc = $ruc;

        return $this;
    }

    public function getRazonSocial(): ?string
    {
        return $this->razonSocial;
    }

    public function setRazonSocial(string $razonSocial): self
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

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
