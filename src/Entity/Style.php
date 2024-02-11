<?php

namespace App\Entity;

use App\Repository\StyleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StyleRepository::class)]
class Style
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: AlbumStyle::class, mappedBy: 'id_style')]
    private Collection $albumStyles;

    public function __construct()
    {
        $this->albumStyles = new ArrayCollection();
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
     * @return Collection<int, AlbumStyle>
     */
    public function getAlbumStyles(): Collection
    {
        return $this->albumStyles;
    }

    public function addAlbumStyle(AlbumStyle $albumStyle): static
    {
        if (!$this->albumStyles->contains($albumStyle)) {
            $this->albumStyles->add($albumStyle);
            $albumStyle->setIdStyle($this);
        }

        return $this;
    }

    public function removeAlbumStyle(AlbumStyle $albumStyle): static
    {
        if ($this->albumStyles->removeElement($albumStyle)) {
            // set the owning side to null (unless already changed)
            if ($albumStyle->getIdStyle() === $this) {
                $albumStyle->setIdStyle(null);
            }
        }

        return $this;
    }
}
