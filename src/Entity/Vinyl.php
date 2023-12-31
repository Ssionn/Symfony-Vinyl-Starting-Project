<?php

namespace App\Entity;

use App\Repository\VinylRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinylRepository::class)]
class Vinyl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $artist = null;

    #[ORM\Column(length: 255)]
    private ?string $song = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(nullable: true)]
    private ?int $rating = null;

    #[ORM\Column(length: 255)]
    private ?string $link = null;

//    #[ORM\Column(nullable: true)]
//    #[ORM\OneToOne(mappedBy: 'image')]
//    private ?int $image_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function getSong(): ?string
    {
        return $this->song;
    }

    public function setSong(string $song): static
    {
        $this->song = $song;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function setLink(string $link): static
    {
        $this->link = $link;

        return $this;
    }

//    public function getImageId(): ?int
//    {
//        return $this->image_id;
//    }
//
//    public function setImageId(?int $image_id): static
//    {
//        $this->image_id = $image_id;
//
//        return $this;
//    }
}
