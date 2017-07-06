<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientepf
 *
 * @ORM\Table(name="clientePf")
 * @ORM\Entity
 */
class Clientepf
{
    /**
     * @var string
     *
     * @ORM\Column(name="tNome", type="string", length=150, nullable=false)
     */
    private $tnome;

    /**
     * @var integer
     *
     * @ORM\Column(name="idSexo", type="integer", nullable=false)
     */
    private $idsexo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEstadoCivil", type="integer", nullable=false)
     */
    private $idestadocivil;

    /**
     * @var string
     *
     * @ORM\Column(name="tRg", type="string", length=9, nullable=false)
     */
    private $trg;

    /**
     * @var string
     *
     * @ORM\Column(name="tCpf", type="string", length=15, nullable=false)
     */
    private $tcpf;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dNascimento", type="date", nullable=false)
     */
    private $dnascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="tNacionalidade", type="string", length=100, nullable=false)
     */
    private $tnacionalidade;

    /**
     * @var string
     *
     * @ORM\Column(name="tNaturalidade", type="string", length=100, nullable=false)
     */
    private $tnaturalidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dCadastro", type="datetime", nullable=false)
     */
    private $dcadastro = 'CURRENT_TIMESTAMP';

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
     * @return Clientepf
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
     * Set idsexo
     *
     * @param integer $idsexo
     *
     * @return Clientepf
     */
    public function setIdsexo($idsexo)
    {
        $this->idsexo = $idsexo;

        return $this;
    }

    /**
     * Get idsexo
     *
     * @return integer
     */
    public function getIdsexo()
    {
        return $this->idsexo;
    }

    /**
     * Set idestadocivil
     *
     * @param integer $idestadocivil
     *
     * @return Clientepf
     */
    public function setIdestadocivil($idestadocivil)
    {
        $this->idestadocivil = $idestadocivil;

        return $this;
    }

    /**
     * Get idestadocivil
     *
     * @return integer
     */
    public function getIdestadocivil()
    {
        return $this->idestadocivil;
    }

    /**
     * Set trg
     *
     * @param string $trg
     *
     * @return Clientepf
     */
    public function setTrg($trg)
    {
        $this->trg = $trg;

        return $this;
    }

    /**
     * Get trg
     *
     * @return string
     */
    public function getTrg()
    {
        return $this->trg;
    }

    /**
     * Set tcpf
     *
     * @param string $tcpf
     *
     * @return Clientepf
     */
    public function setTcpf($tcpf)
    {
        $this->tcpf = $tcpf;

        return $this;
    }

    /**
     * Get tcpf
     *
     * @return string
     */
    public function getTcpf()
    {
        return $this->tcpf;
    }

    /**
     * Set dnascimento
     *
     * @param \DateTime $dnascimento
     *
     * @return Clientepf
     */
    public function setDnascimento($dnascimento)
    {
        $this->dnascimento = $dnascimento;

        return $this;
    }

    /**
     * Get dnascimento
     *
     * @return \DateTime
     */
    public function getDnascimento()
    {
        return $this->dnascimento;
    }

    /**
     * Set tnacionalidade
     *
     * @param string $tnacionalidade
     *
     * @return Clientepf
     */
    public function setTnacionalidade($tnacionalidade)
    {
        $this->tnacionalidade = $tnacionalidade;

        return $this;
    }

    /**
     * Get tnacionalidade
     *
     * @return string
     */
    public function getTnacionalidade()
    {
        return $this->tnacionalidade;
    }

    /**
     * Set tnaturalidade
     *
     * @param string $tnaturalidade
     *
     * @return Clientepf
     */
    public function setTnaturalidade($tnaturalidade)
    {
        $this->tnaturalidade = $tnaturalidade;

        return $this;
    }

    /**
     * Get tnaturalidade
     *
     * @return string
     */
    public function getTnaturalidade()
    {
        return $this->tnaturalidade;
    }

    /**
     * Set dcadastro
     *
     * @param \DateTime $dcadastro
     *
     * @return Clientepf
     */
    public function setDcadastro($dcadastro)
    {
        $this->dcadastro = $dcadastro;

        return $this;
    }

    /**
     * Get dcadastro
     *
     * @return \DateTime
     */
    public function getDcadastro()
    {
        return $this->dcadastro;
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
