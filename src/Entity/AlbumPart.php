<?php

namespace App\Entity;

use App\Repository\AlbumPartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumPartRepository::class)]
class AlbumPart
{

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumParts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\OneToOne(inversedBy: 'albumPart', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parts $id_parts = null;


    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(?Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdParts(): ?Parts
    {
        return $this->id_parts;
    }

    public function setIdParts(Parts $id_parts): static
    {
        $this->id_parts = $id_parts;

        return $this;
    }
}
