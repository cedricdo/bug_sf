<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Certifications
 *
 * @ORM\Table(
 *     name="CERTIFICATIONS",
 *     uniqueConstraints={@ORM\UniqueConstraint(name="CERTI_HK", columns={"CERTI_CERTIFICATION", "CERTI_DELETED"})},
 *     indexes={@ORM\Index(name="CERTIFICATION", columns={"CERTI_CERTIFICATION"})}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CertificationRepository")
 * @UniqueEntity("certification")
 */
class Certification
{
    /**
     * @var string
     *
     * @ORM\Column(name="CERTI_CERTIFICATION", type="string", length=512, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max=512)
     */
    private $certification;

    /**
     * @var integer
     *
     * @ORM\Column(name="CERTI_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Filiere
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Filiere", fetch="EAGER")
     * @ORM\JoinColumn(name="CERTI_FILIE_ID", referencedColumnName="FILIE_ID")
     */
    private $filiere;

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getFiliere(): ?Filiere
    {
        return $this->filiere;
    }

    public function setFiliere(?Filiere $filiere): void
    {
        $this->filiere = $filiere;
    }

    public function getCertification(): string
    {
        return $this->certification;
    }

    public function setCertification(string $certification): void
    {
        $this->certification = $certification;
    }
}


