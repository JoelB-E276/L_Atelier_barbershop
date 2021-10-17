<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=OpeningHoursRepository::class)
 * @Vich\Uploadable
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

    /**
     * @ORM\ManyToOne(targetEntity=Admin::class, inversedBy="openingHours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $admin;


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

    public function getAdmin(): ?admin
    {
        return $this->admin;
    }

    public function setAdmin(?admin $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

}
