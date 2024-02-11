<?php

namespace App\Entity;

use App\Repository\AlbumBandRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumBandRepository::class)]
class AlbumBand
{
    #[ORM\Id]
    #[ORM\OneToOne(inversedBy: 'albumBand', cascade: ['persist', 'remove'])]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumBands')]
    private ?Band $id_band = null;

    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(?Album $id_album): static
    {
        $this->id_album = $id_album;

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
