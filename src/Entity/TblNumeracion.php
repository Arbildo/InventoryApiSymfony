<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TblNumeracion
 *
 * @ORM\Table(name="tbl_numeracion", indexes={@ORM\Index(name="ID_TIPO_COMPROBANTE", columns={"ID_TIPO_COMPROBANTE"})})
 * @ORM\Entity
 */
class TblNumeracion
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_NUMERACION", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNumeracion;

    /**
     * @var int
     *
     * @ORM\Column(name="SERIE", type="integer", nullable=false)
     */
    private $serie;

    /**
     * @var int
     *
     * @ORM\Column(name="INICIO", type="integer", nullable=false)
     */
    private $inicio;

    /**
     * @var int
     *
     * @ORM\Column(name="FIN", type="integer", nullable=false)
     */
    private $fin;

    /**
     * @var int
     *
     * @ORM\Column(name="ESTADO", type="integer", nullable=false)
     */
    private $estado;

    /**
     * @var \TblTipoComprobante
     *
     * @ORM\ManyToOne(targetEntity="TblTipoComprobante")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_COMPROBANTE", referencedColumnName="ID_TIPO_COMPROBANTE")
     * })
     */
    private $idTipoComprobante;

    public function getIdNumeracion(): ?int
    {
        return $this->idNumeracion;
    }

    public function getSerie(): ?int
    {
        return $this->serie;
    }

    public function setSerie(int $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getInicio(): ?int
    {
        return $this->inicio;
    }

    public function setInicio(int $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getFin(): ?int
    {
        return $this->fin;
    }

    public function setFin(int $fin): self
    {
        $this->fin = $fin;

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

    public function getIdTipoComprobante(): ?TblTipoComprobante
    {
        return $this->idTipoComprobante;
    }

    public function setIdTipoComprobante(?TblTipoComprobante $idTipoComprobante): self
    {
        $this->idTipoComprobante = $idTipoComprobante;

        return $this;
    }


}
