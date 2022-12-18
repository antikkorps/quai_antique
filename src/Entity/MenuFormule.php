<?php

namespace App\Entity;

use App\Repository\MenuFormuleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuFormuleRepository::class)]
class MenuFormule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?menu $menu_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?formule $formule_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMenuId(): ?menu
    {
        return $this->menu_id;
    }

    public function setMenuId(?menu $menu_id): self
    {
        $this->menu_id = $menu_id;

        return $this;
    }

    public function getFormuleId(): ?formule
    {
        return $this->formule_id;
    }

    public function setFormuleId(?formule $formule_id): self
    {
        $this->formule_id = $formule_id;

        return $this;
    }
}
