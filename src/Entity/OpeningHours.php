<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OpeningHoursRepository::class)
 */
class OpeningHours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $day;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $open;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $close;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getOpen(): ?string
    {
        return $this->open;
    }

    public function setOpen(?string $open): self
    {
        $this->open = $open;

        return $this;
    }

    public function getClose(): ?string
    {
        return $this->close;
    }

    public function setClose(?string $close): self
    {
        $this->close = $close;

        return $this;
    }

    public function getImage(): ?image
    {
        return $this->image;
    }

    public function setImage(?image $image): self
    {
        $this->image = $image;

        return $this;
    }
}
