<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cidade
 *
 * @ORM\Table(name="cidade", uniqueConstraints={@ORM\UniqueConstraint(name="tIbge", columns={"tIbge"})})
 * @ORM\Entity
 */
class Cidade
{
    /**
     * @var string
     *
     * @ORM\Column(name="tNome", type="string", length=100, nullable=false)
     */
    private $tnome;

    /**
     * @var string
     *
     * @ORM\Column(name="tIbge", type="string", length=7, nullable=false)
     */
    private $tibge;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEstado", type="integer", nullable=false)
     */
    private $idestado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tnome
     *
     * @param string $tnome
     *
     * @return Cidade
     */
    public function setTnome($tnome)
    {
        $this->tnome = $tnome;

        return $this;
    }

    /**
     * Get tnome
     *
     * @return string
     */
    public function getTnome()
    {
        return $this->tnome;
    }

    /**
     * Set tibge
     *
     * @param string $tibge
     *
     * @return Cidade
     */
    public function setTibge($tibge)
    {
        $this->tibge = $tibge;

        return $this;
    }

    /**
     * Get tibge
     *
     * @return string
     */
    public function getTibge()
    {
        return $this->tibge;
    }

    /**
     * Set idestado
     *
     * @param integer $idestado
     *
     * @return Cidade
     */
    public function setIdestado($idestado)
    {
        $this->idestado = $idestado;

        return $this;
    }

    /**
     * Get idestado
     *
     * @return integer
     */
    public function getIdestado()
    {
        return $this->idestado;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
