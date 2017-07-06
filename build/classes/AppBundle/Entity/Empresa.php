<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var string
     *
     * @ORM\Column(name="tNomeFantasia", type="string", length=150, nullable=false)
     */
    private $tnomefantasia;

    /**
     * @var string
     *
     * @ORM\Column(name="tRazaoSocial", type="string", length=150, nullable=false)
     */
    private $trazaosocial;

    /**
     * @var string
     *
     * @ORM\Column(name="tCnpj", type="string", length=18, nullable=false)
     */
    private $tcnpj;

    /**
     * @var string
     *
     * @ORM\Column(name="tCpfResponsavel", type="string", length=15, nullable=false)
     */
    private $tcpfresponsavel;

    /**
     * @var integer
     *
     * @ORM\Column(name="idStatus", type="integer", nullable=false)
     */
    private $idstatus;

    /**
     * @var string
     *
     * @ORM\Column(name="tInscMunicipal", type="string", length=30, nullable=false)
     */
    private $tinscmunicipal;

    /**
     * @var string
     *
     * @ORM\Column(name="tInscEstadual", type="string", length=30, nullable=false)
     */
    private $tinscestadual;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tnomefantasia
     *
     * @param string $tnomefantasia
     *
     * @return Empresa
     */
    public function setTnomefantasia($tnomefantasia)
    {
        $this->tnomefantasia = $tnomefantasia;

        return $this;
    }

    /**
     * Get tnomefantasia
     *
     * @return string
     */
    public function getTnomefantasia()
    {
        return $this->tnomefantasia;
    }

    /**
     * Set trazaosocial
     *
     * @param string $trazaosocial
     *
     * @return Empresa
     */
    public function setTrazaosocial($trazaosocial)
    {
        $this->trazaosocial = $trazaosocial;

        return $this;
    }

    /**
     * Get trazaosocial
     *
     * @return string
     */
    public function getTrazaosocial()
    {
        return $this->trazaosocial;
    }

    /**
     * Set tcnpj
     *
     * @param string $tcnpj
     *
     * @return Empresa
     */
    public function setTcnpj($tcnpj)
    {
        $this->tcnpj = $tcnpj;

        return $this;
    }

    /**
     * Get tcnpj
     *
     * @return string
     */
    public function getTcnpj()
    {
        return $this->tcnpj;
    }

    /**
     * Set tcpfresponsavel
     *
     * @param string $tcpfresponsavel
     *
     * @return Empresa
     */
    public function setTcpfresponsavel($tcpfresponsavel)
    {
        $this->tcpfresponsavel = $tcpfresponsavel;

        return $this;
    }

    /**
     * Get tcpfresponsavel
     *
     * @return string
     */
    public function getTcpfresponsavel()
    {
        return $this->tcpfresponsavel;
    }

    /**
     * Set idstatus
     *
     * @param integer $idstatus
     *
     * @return Empresa
     */
    public function setIdstatus($idstatus)
    {
        $this->idstatus = $idstatus;

        return $this;
    }

    /**
     * Get idstatus
     *
     * @return integer
     */
    public function getIdstatus()
    {
        return $this->idstatus;
    }

    /**
     * Set tinscmunicipal
     *
     * @param string $tinscmunicipal
     *
     * @return Empresa
     */
    public function setTinscmunicipal($tinscmunicipal)
    {
        $this->tinscmunicipal = $tinscmunicipal;

        return $this;
    }

    /**
     * Get tinscmunicipal
     *
     * @return string
     */
    public function getTinscmunicipal()
    {
        return $this->tinscmunicipal;
    }

    /**
     * Set tinscestadual
     *
     * @param string $tinscestadual
     *
     * @return Empresa
     */
    public function setTinscestadual($tinscestadual)
    {
        $this->tinscestadual = $tinscestadual;

        return $this;
    }

    /**
     * Get tinscestadual
     *
     * @return string
     */
    public function getTinscestadual()
    {
        return $this->tinscestadual;
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
