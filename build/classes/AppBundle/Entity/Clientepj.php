<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientepj
 *
 * @ORM\Table(name="clientePj")
 * @ORM\Entity
 */
class Clientepj
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
     * @ORM\Column(name="tCpfResponsavel", type="string", length=15, nullable=false)
     */
    private $tcpfresponsavel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dCadastro", type="datetime", nullable=false)
     */
    private $dcadastro = 'CURRENT_TIMESTAMP';

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
     * @return Clientepj
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
     * Set tcpfresponsavel
     *
     * @param string $tcpfresponsavel
     *
     * @return Clientepj
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
     * Set dcadastro
     *
     * @param \DateTime $dcadastro
     *
     * @return Clientepj
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
     * Set trazaosocial
     *
     * @param string $trazaosocial
     *
     * @return Clientepj
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
     * @return Clientepj
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
