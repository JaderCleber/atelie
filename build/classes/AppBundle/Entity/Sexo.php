<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sexo
 *
 * @ORM\Table(name="sexo")
 * @ORM\Entity
 */
class Sexo
{
    /**
     * @var string
     *
     * @ORM\Column(name="tNome", type="string", length=10, nullable=false)
     */
    private $tnome;

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
     * @return Sexo
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
