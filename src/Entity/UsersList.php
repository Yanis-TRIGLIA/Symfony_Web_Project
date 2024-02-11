<?php

namespace App\Entity;

use App\Repository\UsersListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersListRepository::class)]
class UsersList
{
    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $id_user = null;

    #[ORM\Id]
    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Liste $id_list = null;

    public function getIdUser(): ?Users
    {
        return $this->id_user;
    }

    public function setIdUser(Users $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdList(): ?Liste
    {
        return $this->id_list;
    }

    public function setIdList(Liste $id_list): static
    {
        $this->id_list = $id_list;

        return $this;
    }
}
