<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Filiere
 *
 * @ORM\Table(
 *     name="FILIERE",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="FILIE_HK", columns={"FILIE_FILIERE", "FILIE_DELETED"})}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\FiliereRepository")
 * @UniqueEntity("filiere")
 */
class Filiere
{
    /**
     * @var string
     *
     * @ORM\Column(name="FILIE_FILIERE", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $filiere;

    /**
     * @var integer
     *
     * @ORM\Column(name="FILIE_ID", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getFiliere(): string
    {
        return $this->filiere;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->getFiliere();
    }
}

