<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblProducto
 *
 * @ORM\Table(name="tbl_producto", indexes={@ORM\Index(name="ID_UNIDAD", columns={"ID_UNIDAD"}), @ORM\Index(name="ID_CLASE", columns={"ID_TIPO"})})
 * @ORM\Entity
 */
class TblProducto
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_PRODUCTO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=200, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="CODIGO", type="string", length=200, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var \TblProductoEstado
     *
     * @ORM\ManyToOne(targetEntity="TblProductoEstado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTADO", referencedColumnName="ID_ESTADO", nullable=false)
     * })
     */
    private $estado;

    /**
     * @var \TblTipoProducto
     *
     * @ORM\ManyToOne(targetEntity="TblTipoProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO", referencedColumnName="ID_TIPO")
     * })
     */
    private $idTipo;

    /**
     * @var \TblUnidadMedida
     *
     * @ORM\ManyToOne(targetEntity="TblUnidadMedida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_UNIDAD", referencedColumnName="ID_UNIDAD")
     * })
     */
    private $idUnidad;

    public function getIdProducto(): ?int
    {
        return $this->idProducto;
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

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEstado(): ?TblProductoEstado
    {
        return $this->estado;
    }

    public function setEstado(?TblProductoEstado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdTipo(): ?TblTipoProducto
    {
        return $this->idTipo;
    }

    public function setIdTipo(?TblTipoProducto $idTipo): self
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    public function getIdUnidad(): ?TblUnidadMedida
    {
        return $this->idUnidad;
    }

    public function setIdUnidad(?TblUnidadMedida $idUnidad): self
    {
        $this->idUnidad = $idUnidad;

        return $this;
    }


}
