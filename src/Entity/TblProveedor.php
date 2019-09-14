<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProveedor
 *
 * @ORM\Table(name="tbl_proveedor", indexes={@ORM\Index(name="ID_TIPO", columns={"ID_TIPO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblProveedorRepository")
 */
class TblProveedor
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PROVEEDOR", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="RUC", type="string", length=200, nullable=false)
     */
    private $ruc;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEFONO", type="string", length=200, nullable=false)
     */
    private $telefono;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CELULAR", type="string", length=200, nullable=true)
     */
    private $celular;

    /**
     * @var string|null
     *
     * @ORM\Column(name="WEB", type="string", length=200, nullable=true)
     */
    private $web;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CONTACTO", type="string", length=200, nullable=true)
     */
    private $contacto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TELEF_CONTACTO", type="string", length=200, nullable=true)
     */
    private $telefContacto;

    /**
     * @var string
     *
     * @ORM\Column(name="DIRECCION", type="string", length=200, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="CORREO", type="string", length=200, nullable=false)
     */
    private $correo;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblTipoEmpresa
     *
     * @ORM\ManyToOne(targetEntity="TblTipoEmpresa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO", referencedColumnName="ID_TIPO")
     * })
     */
    private $idTipo;

    public function getIdProveedor(): ?int
    {
        return $this->idProveedor;
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getContacto(): ?string
    {
        return $this->contacto;
    }

    public function setContacto(?string $contacto): self
    {
        $this->contacto = $contacto;

        return $this;
    }

    public function getTelefContacto(): ?string
    {
        return $this->telefContacto;
    }

    public function setTelefContacto(?string $telefContacto): self
    {
        $this->telefContacto = $telefContacto;

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

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

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

    public function getIdTipo(): ?TblTipoEmpresa
    {
        return $this->idTipo;
    }

    public function setIdTipo(?TblTipoEmpresa $idTipo): self
    {
        $this->idTipo = $idTipo;

        return $this;
    }


}
