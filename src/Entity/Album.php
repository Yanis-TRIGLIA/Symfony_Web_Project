<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $countries = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(mappedBy: 'id_album', cascade: ['persist', 'remove'])]
    private ?AlbumBand $albumBand = null;

    #[ORM\OneToMany(targetEntity: AlbumPart::class, mappedBy: 'id_album')]
    private Collection $albumParts;

    #[ORM\OneToOne(mappedBy: 'id_album', cascade: ['persist', 'remove'])]
    private ?AlbumLabel $albumLabel = null;

    #[ORM\OneToMany(targetEntity: AlbumGender::class, mappedBy: 'id_album')]
    private Collection $albumGenders;

    #[ORM\OneToMany(targetEntity: AlbumStyle::class, mappedBy: 'id_album')]
    private Collection $albumStyles;

    #[ORM\OneToMany(targetEntity: Liste::class, mappedBy: 'albums')]
    private Collection $listes;

    #[ORM\OneToOne(mappedBy: 'id_album', cascade: ['persist', 'remove'])]
    private ?AlbumCover $albumCover ;

    public function __construct()
    {
        $this->albumParts = new ArrayCollection();
        $this->albumGenders = new ArrayCollection();
        $this->albumStyles = new ArrayCollection();
        $this->listes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountries(): ?string
    {
        return $this->countries;
    }

    public function setCountries(string $countries): static
    {
        $this->countries = $countries;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
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

    public function getAlbumBand(): ?AlbumBand
    {
        return $this->albumBand;
    }

    public function setAlbumBand(?AlbumBand $albumBand): static
    {
        if ($albumBand === null && $this->albumBand !== null) {
            $this->albumBand->setIdAlbum(null);
        }

        if ($albumBand !== null && $albumBand->getIdAlbum() !== $this) {
            $albumBand->setIdAlbum($this);
        }

        $this->albumBand = $albumBand;

        return $this;
    }

    /**
     * @return Collection<int, AlbumPart>
     */
    public function getAlbumParts(): Collection
    {
        return $this->albumParts;
    }

    public function addAlbumPart(AlbumPart $albumPart): static
    {
        if (!$this->albumParts->contains($albumPart)) {
            $this->albumParts->add($albumPart);
            $albumPart->setIdAlbum($this);
        }

        return $this;
    }

    public function removeAlbumPart(AlbumPart $albumPart): static
    {
        if ($this->albumParts->removeElement($albumPart)) {
            if ($albumPart->getIdAlbum() === $this) {
                $albumPart->setIdAlbum(null);
            }
        }

        return $this;
    }

    public function getAlbumLabel(): ?AlbumLabel
    {
        return $this->albumLabel;
    }

    public function setAlbumLabel(AlbumLabel $albumLabel): static
    {
        if ($albumLabel->getIdAlbum() !== $this) {
            $albumLabel->setIdAlbum($this);
        }

        $this->albumLabel = $albumLabel;

        return $this;
    }

    /**
     * @return Collection<int, AlbumGender>
     */
    public function getAlbumGenders(): Collection
    {
        return $this->albumGenders;
    }

    public function addAlbumGender(AlbumGender $albumGender): static
    {
        if (!$this->albumGenders->contains($albumGender)) {
            $this->albumGenders->add($albumGender);
            $albumGender->setIdAlbum($this);
        }

        return $this;
    }

    public function removeAlbumGender(AlbumGender $albumGender): static
    {
        if ($this->albumGenders->removeElement($albumGender)) {

            if ($albumGender->getIdAlbum() === $this) {
                $albumGender->setIdAlbum(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AlbumStyle>
     */
    public function getAlbumStyles(): Collection
    {
        return $this->albumStyles;
    }

    public function addAlbumStyle(AlbumStyle $albumStyle): static
    {
        if (!$this->albumStyles->contains($albumStyle)) {
            $this->albumStyles->add($albumStyle);
            $albumStyle->setIdAlbum($this);
        }

        return $this;
    }

    public function removeAlbumStyle(AlbumStyle $albumStyle): static
    {
        if ($this->albumStyles->removeElement($albumStyle)) {

            if ($albumStyle->getIdAlbum() === $this) {
                $albumStyle->setIdAlbum(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Liste>
     */
    public function getListes(): Collection
    {
        return $this->listes;
    }

    public function addListe(Liste $liste): self
    {
        
        $this->listes[] = $liste;
        $liste->addAlbum($this);
    

        return $this;
    }

    public function removeListe(Liste $liste): self
    {
        if ($this->listes->removeElement($liste)) {
            $liste->removeAlbum($this);
        }

        return $this;
    }

    public function getAlbumCover(): ?AlbumCover
    {
        return $this->albumCover;
    }

    public function setAlbumCover(AlbumCover $albumCover): static
    {

        if ($albumCover->getIdAlbum() !== $this) {
            $albumCover->setIdAlbum($this);
        }

        $this->albumCover = $albumCover;

        return $this;
    }
}
