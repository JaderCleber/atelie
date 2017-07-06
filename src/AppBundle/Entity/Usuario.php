<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var string
     *
     * @ORM\Column(name="tLogin", type="string", length=50, nullable=false)
     */
    private $tlogin;

    /**
     * @var string
     *
     * @ORM\Column(name="tSenha", type="string", length=50, nullable=false)
     */
    private $tsenha;

    /**
     * @var string
     *
     * @ORM\Column(name="tNome", type="string", length=100, nullable=false)
     */
    private $tnome;

    /**
     * @var integer
     *
     * @ORM\Column(name="idNivel", type="integer", nullable=false)
     */
    private $idnivel;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tlogin
     *
     * @param string $tlogin
     *
     * @return Usuario
     */
    public function setTlogin($tlogin)
    {
        $this->tlogin = $tlogin;

        return $this;
    }

    /**
     * Get tlogin
     *
     * @return string
     */
    public function getTlogin()
    {
        return $this->tlogin;
    }

    /**
     * Set tsenha
     *
     * @param string $tsenha
     *
     * @return Usuario
     */
    public function setTsenha($tsenha)
    {
        $this->tsenha = $tsenha;

        return $this;
    }

    /**
     * Get tsenha
     *
     * @return string
     */
    public function getTsenha()
    {
        return $this->tsenha;
    }

    /**
     * Set tnome
     *
     * @param string $tnome
     *
     * @return Usuario
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
     * Set idnivel
     *
     * @param integer $idnivel
     *
     * @return Usuario
     */
    public function setIdnivel($idnivel)
    {
        $this->idnivel = $idnivel;

        return $this;
    }

    /**
     * Get idnivel
     *
     * @return integer
     */
    public function getIdnivel()
    {
        return $this->idnivel;
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
