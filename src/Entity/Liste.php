<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeRepository::class)]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $list_name = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $id_user = null;

    #[ORM\OneToMany(targetEntity: AlbumList::class, mappedBy: 'id_list')]
    private Collection $albumLists;

    public function __construct()
    {
        $this->albumLists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListName(): ?string
    {
        return $this->list_name;
    }

    public function setListName(string $list_name): static
    {
        $this->list_name = $list_name;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->id_user;
    }

    public function setIdUser(Users $id_user): static
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection<int, AlbumList>
     */
    public function getAlbumLists(): Collection
    {
        return $this->albumLists;
    }

    public function addAlbumList(AlbumList $albumList): static
    {
        if (!$this->albumLists->contains($albumList)) {
            $this->albumLists->add($albumList);
            $albumList->setIdList($this);
        }

        return $this;
    }

    public function removeAlbumList(AlbumList $albumList): static
    {
        if ($this->albumLists->removeElement($albumList)) {
            // set the owning side to null (unless already changed)
            if ($albumList->getIdList() === $this) {
                $albumList->setIdList(null);
            }
        }

        return $this;
    }
}
