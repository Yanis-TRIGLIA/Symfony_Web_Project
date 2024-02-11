<?php

namespace App\Entity;

use App\Repository\AlbumGenderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumGenderRepository::class)]
class AlbumGender
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumGenders')]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumGenders')]
    private ?Gender $id_gender = null;


    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(?Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdGender(): ?Gender
    {
        return $this->id_gender;
    }

    public function setIdGender(?Gender $id_gender): static
    {
        $this->id_gender = $id_gender;

        return $this;
    }
}
