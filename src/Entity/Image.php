<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
final class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    #[ORM\Column]
    private ?string $imageFilename;

//    #[ORM\Column]
//    private ?string $artist = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageFilename(): ?string
    {
        return $this->imageFilename;
    }

    public function setImageFilename(string $imageFilename): self
    {
        $this->imageFilename = $imageFilename;

        return $this;
    }

//    public function getArtist(): ?string
//    {
//        return $this->artist;
//    }
//
//    public function setArtist(string $artist): static
//    {
//        $this->artist = $artist;
//
//        return $this;
//    }

}
