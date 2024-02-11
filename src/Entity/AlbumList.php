<?php

namespace App\Entity;

use App\Repository\AlbumListRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumListRepository::class)]
class AlbumList
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumLists')]
    private ?Album $id_album = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'albumLists')]
    private ?Liste $id_list = null;


    public function getIdAlbum(): ?Album
    {
        return $this->id_album;
    }

    public function setIdAlbum(?Album $id_album): static
    {
        $this->id_album = $id_album;

        return $this;
    }

    public function getIdList(): ?Liste
    {
        return $this->id_list;
    }

    public function setIdList(?Liste $id_list): static
    {
        $this->id_list = $id_list;

        return $this;
    }
}
