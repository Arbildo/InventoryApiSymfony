<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblCliente
 *
 * @ORM\Table(name="tbl_cliente", indexes={@ORM\Index(name="ID_TIPO", columns={"ID_TIPO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblClienteRepository")
 */
class TblCliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_CLIENTE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCliente;

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
     * @ORM\Column(name="NUMERO_DOC", type="string", length=200, nullable=false)
     */
    private $numeroDoc;

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

    /**
     * @var \TblTipoDocumento
     *
     * @ORM\ManyToOne(targetEntity="TblTipoDocumento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO", referencedColumnName="ID_TIPO")
     * })
     */
    private $idTipo;

    public function getIdCliente(): ?int
    {
        return $this->idCliente;
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

    public function getNumeroDoc(): ?string
    {
        return $this->numeroDoc;
    }

    public function setNumeroDoc(string $numeroDoc): self
    {
        $this->numeroDoc = $numeroDoc;

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

    public function getIdTipo(): ?TblTipoDocumento
    {
        return $this->idTipo;
    }

    public function setIdTipo(?TblTipoDocumento $idTipo): self
    {
        $this->idTipo = $idTipo;

        return $this;
    }

}
