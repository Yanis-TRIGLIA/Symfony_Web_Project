<?php

namespace App\Entity;

use App\Repository\AlbumLabelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumLabelRepository::class)]
class AlbumLabel
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumLabel', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumLabel', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Label $id_label = null;


    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdLabel(): ?Label
    {
        return $this->id_label;
    }

    public function setIdLabel(Label $id_label): static
    {
        $this->id_label = $id_label;

        return $this;
    }
}
