<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TblUsuarioRepository;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * TblUsuario
 *
 * @ORM\Table(name="tbl_usuario")
 * @ORM\Entity(repositoryClass=TblUsuarioRepository::class)
 *
 */
class TblUsuario implements UserInterface
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
     * @var TblUsuarioEstado
     *
     * @ORM\ManyToOne(targetEntity="TblUsuarioEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ESTADO", referencedColumnName="ID_ESTADO")
     * })
     */
    private $estado;

    /**
     * @var TblCargo
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getEstado(): ?TblUsuarioEstado
    {
        return $this->estado;
    }

    public function setEstado(TblUsuarioEstado $estado): self
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


    public function getRoles()
    {
        $roles[] = 'Foo';
        return array_unique($roles);
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        return $this->correo;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
