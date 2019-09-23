<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUsuario
 *
 * @ORM\Table(name="tbl_usuario", indexes={@ORM\Index(name="ID_CARGO", columns={"ID_CARGO"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblUsuarioRepository")
 */
class TblUsuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_USUARIO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRES", type="string", length=200, nullable=false)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="APELLIDOS", type="string", length=200, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="USUARIO", type="string", length=200, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=200, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="CORREO", type="string", length=200, nullable=false)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="FOTO", type="string", length=200, nullable=false)
     */
    private $foto;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblCargo
     *
     * @ORM\ManyToOne(targetEntity="TblCargo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CARGO", referencedColumnName="ID_CARGO")
     * })
     */
    private $idCargo;

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
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

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getUsuario(): ?string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): self
    {
        $this->usuario = $usuario;

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

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(string $foto): self
    {
        $this->foto = $foto;

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

    public function getCargo(): ?TblCargo
    {
        return $this->idCargo;
    }

    public function setCargo(?TblCargo $idCargo): self
    {
        $this->idCargo = $idCargo;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}