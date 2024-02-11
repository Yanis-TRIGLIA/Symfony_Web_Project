<?php

namespace App\Entity;

use App\Repository\ArtistsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistsRepository::class)]
class Artists
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $alias = null;

    #[ORM\OneToOne(mappedBy: 'id_artists', cascade: ['persist', 'remove'])]
    private ?ArtistBand $artistBand = null;

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

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): static
    {
        $this->alias = $alias;

        return $this;
    }

    public function getArtistBand(): ?ArtistBand
    {
        return $this->artistBand;
    }

    public function setArtistBand(?ArtistBand $artistBand): static
    {
        // unset the owning side of the relation if necessary
        if ($artistBand === null && $this->artistBand !== null) {
            $this->artistBand->setIdArtists(null);
        }

        // set the owning side of the relation if necessary
        if ($artistBand !== null && $artistBand->getIdArtists() !== $this) {
            $artistBand->setIdArtists($this);
        }

        $this->artistBand = $artistBand;

        return $this;
    }
}
