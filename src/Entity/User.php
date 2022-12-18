<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    private ?string $nom = null;

    #[ORM\Column(length: 60)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(nullable: true)]
    private ?int $convives = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?role $role_id = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getConvives(): ?int
    {
        return $this->convives;
    }

    public function setConvives(?int $convives): self
    {
        $this->convives = $convives;

        return $this;
    }

    public function getRoleId(): ?role
    {
        return $this->role_id;
    }

    public function setRoleId(?role $role_id): self
    {
        $this->role_id = $role_id;

        return $this;
    }

}
