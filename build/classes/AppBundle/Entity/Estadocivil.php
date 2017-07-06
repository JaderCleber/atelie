<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estadocivil
 *
 * @ORM\Table(name="estadoCivil")
 * @ORM\Entity
 */
class Estadocivil
{
    /**
     * @var string
     *
     * @ORM\Column(name="tNome", type="string", length=20, nullable=false)
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
     * @return Estadocivil
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
