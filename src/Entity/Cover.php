<?php

namespace App\Entity;

use App\Repository\CoverRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoverRepository::class)]
class Cover
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id ;

    #[ORM\Column(length: 255)]
    public ?string $url = null;

    #[ORM\OneToOne(mappedBy: 'id_cover', cascade: ['persist', 'remove'])]
    public ?AlbumCover $albumCover = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getAlbumCover(): ?AlbumCover
    {
        return $this->albumCover;
    }

    public function setAlbumCover(AlbumCover $albumCover): static
    {
        // set the owning side of the relation if necessary
        if ($albumCover->getIdCover() !== $this) {
            $albumCover->setIdCover($this);
        }

        $this->albumCover = $albumCover;

        return $this;
    }
}
