<?php

namespace App\Entity;

use App\Repository\AlbumStyleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumStyleRepository::class)]
class AlbumStyle
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumStyles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumStyles')]
    private ?Style $id_style = null;



    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(?Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdStyle(): ?Style
    {
        return $this->id_style;
    }

    public function setIdStyle(?Style $id_style): static
    {
        $this->id_style = $id_style;

        return $this;
    }
}
