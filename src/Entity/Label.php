<?php

namespace App\Entity;

use App\Repository\LabelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LabelRepository::class)]
class Label
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'id_label', cascade: ['persist', 'remove'])]
    private ?AlbumLabel $albumLabel = null;

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

    public function getAlbumLabel(): ?AlbumLabel
    {
        return $this->albumLabel;
    }

    public function setAlbumLabel(AlbumLabel $albumLabel): static
    {
        // set the owning side of the relation if necessary
        if ($albumLabel->getIdLabel() !== $this) {
            $albumLabel->setIdLabel($this);
        }

        $this->albumLabel = $albumLabel;

        return $this;
    }
}
