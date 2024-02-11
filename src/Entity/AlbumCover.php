<?php

namespace App\Entity;

use App\Repository\AlbumCoverRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumCoverRepository::class)]
class AlbumCover
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumCover', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumCover', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?Cover $id_cover = null;


    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdCover(): ?Cover
    {
        return $this->id_cover;
    }

    public function setIdCover(Cover $id_cover): static
    {
        $this->id_cover = $id_cover;

        return $this;
    }
}
