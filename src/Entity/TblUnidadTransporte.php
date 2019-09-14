<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblUnidadTransporte
 *
 * @ORM\Table(name="tbl_unidad_transporte", indexes={@ORM\Index(name="ID_EMPRESA", columns={"ID_EMPRESA"})})
 * @ORM\Entity(repositoryClass="App\Repository\TblUnidadTransporteRepository")
 */
class TblUnidadTransporte
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_UNIDAD", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="NUM_PLACA", type="string", length=200, nullable=false)
     */
    private $numPlaca;

    /**
     * @var string
     *
     * @ORM\Column(name="MARCA", type="string", length=200, nullable=false)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="LICENCIA", type="string", length=200, nullable=false)
     */
    private $licencia;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblEmpresaTransporte
     *
     * @ORM\ManyToOne(targetEntity="TblEmpresaTransporte")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EMPRESA", referencedColumnName="ID_EMPRESA")
     * })
     */
    private $idEmpresa;

    public function getIdUnidad(): ?int
    {
        return $this->idUnidad;
    }

    public function getNumPlaca(): ?string
    {
        return $this->numPlaca;
    }

    public function setNumPlaca(string $numPlaca): self
    {
        $this->numPlaca = $numPlaca;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getLicencia(): ?string
    {
        return $this->licencia;
    }

    public function setLicencia(string $licencia): self
    {
        $this->licencia = $licencia;

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

    public function getIdEmpresa(): ?TblEmpresaTransporte
    {
        return $this->idEmpresa;
    }

    public function setIdEmpresa(?TblEmpresaTransporte $idEmpresa): self
    {
        $this->idEmpresa = $idEmpresa;

        return $this;
    }


}
