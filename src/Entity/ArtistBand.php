<?php

namespace App\Entity;

use App\Repository\ArtistBandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistBandRepository::class)]
class ArtistBand
{

    #[ORM\Id]
    #[ORM\OneToOne(inversedBy: 'artistBand', cascade: ['persist', 'remove'])]
    private ?Artists $id_artists = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'artistBands')]
    private ?Band $id_band = null;


    public function getIdArtists(): ?Artists
    {
        return $this->id_artists;
    }

    public function setIdArtists(?Artists $id_artists): static
    {
        $this->id_artists = $id_artists;

        return $this;
    }

    public function getIdBand(): ?Band
    {
        return $this->id_band;
    }

    public function setIdBand(?Band $id_band): static
    {
        $this->id_band = $id_band;

        return $this;
    }
}
