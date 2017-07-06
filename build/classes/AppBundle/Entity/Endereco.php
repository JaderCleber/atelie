<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Endereco
 *
 * @ORM\Table(name="endereco")
 * @ORM\Entity
 */
class Endereco
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCidade", type="integer", nullable=false)
     */
    private $idcidade;

    /**
     * @var string
     *
     * @ORM\Column(name="tEndereco", type="string", length=100, nullable=false)
     */
    private $tendereco;

    /**
     * @var string
     *
     * @ORM\Column(name="tCep", type="string", length=9, nullable=false)
     */
    private $tcep;

    /**
     * @var string
     *
     * @ORM\Column(name="tNumero", type="string", length=15, nullable=false)
     */
    private $tnumero;

    /**
     * @var string
     *
     * @ORM\Column(name="tComplemento", type="string", length=150, nullable=false)
     */
    private $tcomplemento;

    /**
     * @var string
     *
     * @ORM\Column(name="tObservacao", type="string", length=255, nullable=false)
     */
    private $tobservacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idcidade
     *
     * @param integer $idcidade
     *
     * @return Endereco
     */
    public function setIdcidade($idcidade)
    {
        $this->idcidade = $idcidade;

        return $this;
    }

    /**
     * Get idcidade
     *
     * @return integer
     */
    public function getIdcidade()
    {
        return $this->idcidade;
    }

    /**
     * Set tendereco
     *
     * @param string $tendereco
     *
     * @return Endereco
     */
    public function setTendereco($tendereco)
    {
        $this->tendereco = $tendereco;

        return $this;
    }

    /**
     * Get tendereco
     *
     * @return string
     */
    public function getTendereco()
    {
        return $this->tendereco;
    }

    /**
     * Set tcep
     *
     * @param string $tcep
     *
     * @return Endereco
     */
    public function setTcep($tcep)
    {
        $this->tcep = $tcep;

        return $this;
    }

    /**
     * Get tcep
     *
     * @return string
     */
    public function getTcep()
    {
        return $this->tcep;
    }

    /**
     * Set tnumero
     *
     * @param string $tnumero
     *
     * @return Endereco
     */
    public function setTnumero($tnumero)
    {
        $this->tnumero = $tnumero;

        return $this;
    }

    /**
     * Get tnumero
     *
     * @return string
     */
    public function getTnumero()
    {
        return $this->tnumero;
    }

    /**
     * Set tcomplemento
     *
     * @param string $tcomplemento
     *
     * @return Endereco
     */
    public function setTcomplemento($tcomplemento)
    {
        $this->tcomplemento = $tcomplemento;

        return $this;
    }

    /**
     * Get tcomplemento
     *
     * @return string
     */
    public function getTcomplemento()
    {
        return $this->tcomplemento;
    }

    /**
     * Set tobservacao
     *
     * @param string $tobservacao
     *
     * @return Endereco
     */
    public function setTobservacao($tobservacao)
    {
        $this->tobservacao = $tobservacao;

        return $this;
    }

    /**
     * Get tobservacao
     *
     * @return string
     */
    public function getTobservacao()
    {
        return $this->tobservacao;
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
