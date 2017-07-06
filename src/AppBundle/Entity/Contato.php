<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contato
 *
 * @ORM\Table(name="contato")
 * @ORM\Entity
 */
class Contato
{
    /**
     * @var string
     *
     * @ORM\Column(name="tContato", type="string", length=100, nullable=false)
     */
    private $tcontato;

    /**
     * @var integer
     *
     * @ORM\Column(name="idTipo", type="integer", nullable=false)
     */
    private $idtipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set tcontato
     *
     * @param string $tcontato
     *
     * @return Contato
     */
    public function setTcontato($tcontato)
    {
        $this->tcontato = $tcontato;

        return $this;
    }

    /**
     * Get tcontato
     *
     * @return string
     */
    public function getTcontato()
    {
        return $this->tcontato;
    }

    /**
     * Set idtipo
     *
     * @param integer $idtipo
     *
     * @return Contato
     */
    public function setIdtipo($idtipo)
    {
        $this->idtipo = $idtipo;

        return $this;
    }

    /**
     * Get idtipo
     *
     * @return integer
     */
    public function getIdtipo()
    {
        return $this->idtipo;
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
