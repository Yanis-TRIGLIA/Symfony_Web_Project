<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(targetEntity: ArtistBand::class, mappedBy: 'id_band')]
    private Collection $artistBands;

    #[ORM\OneToMany(targetEntity: AlbumBand::class, mappedBy: 'id_band')]
    private Collection $albumBands;

    public function __construct()
    {
        $this->artistBands = new ArrayCollection();
        $this->albumBands = new ArrayCollection();
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
     * @return Collection<int, ArtistBand>
     */
    public function getArtistBands(): Collection
    {
        return $this->artistBands;
    }

    public function addArtistBand(ArtistBand $artistBand): static
    {
        if (!$this->artistBands->contains($artistBand)) {
            $this->artistBands->add($artistBand);
            $artistBand->setIdBand($this);
        }

        return $this;
    }

    public function removeArtistBand(ArtistBand $artistBand): static
    {
        if ($this->artistBands->removeElement($artistBand)) {
            // set the owning side to null (unless already changed)
            if ($artistBand->getIdBand() === $this) {
                $artistBand->setIdBand(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AlbumBand>
     */
    public function getAlbumBands(): Collection
    {
        return $this->albumBands;
    }

    public function addAlbumBand(AlbumBand $albumBand): static
    {
        if (!$this->albumBands->contains($albumBand)) {
            $this->albumBands->add($albumBand);
            $albumBand->setIdBand($this);
        }

        return $this;
    }

    public function removeAlbumBand(AlbumBand $albumBand): static
    {
        if ($this->albumBands->removeElement($albumBand)) {
            // set the owning side to null (unless already changed)
            if ($albumBand->getIdBand() === $this) {
                $albumBand->setIdBand(null);
            }
        }

        return $this;
    }
}
