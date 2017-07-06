<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado", uniqueConstraints={@ORM\UniqueConstraint(name="tIbge", columns={"tIbge"})})
 * @ORM\Entity
 */
class Estado
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
     * @ORM\Column(name="tSigla", type="string", length=3, nullable=false)
     */
    private $tsigla;

    /**
     * @var string
     *
     * @ORM\Column(name="tIbge", type="string", length=2, nullable=false)
     */
    private $tibge;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPais", type="integer", nullable=false)
     */
    private $idpais;

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
     * @return Estado
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
     * Set tsigla
     *
     * @param string $tsigla
     *
     * @return Estado
     */
    public function setTsigla($tsigla)
    {
        $this->tsigla = $tsigla;

        return $this;
    }

    /**
     * Get tsigla
     *
     * @return string
     */
    public function getTsigla()
    {
        return $this->tsigla;
    }

    /**
     * Set tibge
     *
     * @param string $tibge
     *
     * @return Estado
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
     * Set idpais
     *
     * @param integer $idpais
     *
     * @return Estado
     */
    public function setIdpais($idpais)
    {
        $this->idpais = $idpais;

        return $this;
    }

    /**
     * Get idpais
     *
     * @return integer
     */
    public function getIdpais()
    {
        return $this->idpais;
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
