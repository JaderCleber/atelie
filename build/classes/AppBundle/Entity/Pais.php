<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="pais", uniqueConstraints={@ORM\UniqueConstraint(name="tNome", columns={"tNome", "tBacen", "tCod"})})
 * @ORM\Entity
 */
class Pais
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
     * @ORM\Column(name="tBacen", type="string", length=10, nullable=false)
     */
    private $tbacen;

    /**
     * @var string
     *
     * @ORM\Column(name="tCod", type="string", length=10, nullable=false)
     */
    private $tcod;

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
     * @return Pais
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
     * Set tbacen
     *
     * @param string $tbacen
     *
     * @return Pais
     */
    public function setTbacen($tbacen)
    {
        $this->tbacen = $tbacen;

        return $this;
    }

    /**
     * Get tbacen
     *
     * @return string
     */
    public function getTbacen()
    {
        return $this->tbacen;
    }

    /**
     * Set tcod
     *
     * @param string $tcod
     *
     * @return Pais
     */
    public function setTcod($tcod)
    {
        $this->tcod = $tcod;

        return $this;
    }

    /**
     * Get tcod
     *
     * @return string
     */
    public function getTcod()
    {
        return $this->tcod;
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
