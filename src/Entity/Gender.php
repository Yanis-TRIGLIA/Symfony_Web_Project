<?php

namespace App\Entity;

use App\Repository\GenderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenderRepository::class)]
class Gender
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: AlbumGender::class, mappedBy: 'id_gender')]
    private Collection $albumGenders;

    public function __construct()
    {
        $this->albumGenders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, AlbumGender>
     */
    public function getAlbumGenders(): Collection
    {
        return $this->albumGenders;
    }

    public function addAlbumGender(AlbumGender $albumGender): static
    {
        if (!$this->albumGenders->contains($albumGender)) {
            $this->albumGenders->add($albumGender);
            $albumGender->setIdGender($this);
        }

        return $this;
    }

    public function removeAlbumGender(AlbumGender $albumGender): static
    {
        if ($this->albumGenders->removeElement($albumGender)) {
            // set the owning side to null (unless already changed)
            if ($albumGender->getIdGender() === $this) {
                $albumGender->setIdGender(null);
            }
        }

        return $this;
    }
}
