<?php

namespace App\Entity;

use App\Repository\PartsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PartsRepository::class)]
class Parts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $duration = null;

    #[ORM\OneToOne(mappedBy: 'id_parts', cascade: ['persist', 'remove'])]
    private ?AlbumPart $albumPart = null;

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

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getAlbumPart(): ?AlbumPart
    {
        return $this->albumPart;
    }

    public function setAlbumPart(AlbumPart $albumPart): static
    {
        // set the owning side of the relation if necessary
        if ($albumPart->getIdParts() !== $this) {
            $albumPart->setIdParts($this);
        }

        $this->albumPart = $albumPart;

        return $this;
    }
}
