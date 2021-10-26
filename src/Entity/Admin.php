<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 * @UniqueEntity(fields={"username"}, message="Cette identifiant ne peut être utilisé")
 */
class Admin implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="admin")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=OpeningHours::class, mappedBy="admin")
     */
    private $openingHours;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="admin")
     */
    private $services;

    /**
     * @ORM\OneToMany(targetEntity=Information::class, mappedBy="admin")
     */
    private $information;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->openingHours = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->information = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
     public function getUsername(): string
    {
        return (string) $this->username;
    } 

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see 
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAdmin($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getAdmin() === $this) {
                $image->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OpeningHours[]
     */
    public function getOpeningHours(): Collection
    {
        return $this->openingHours;
    }

    public function addOpeningHour(OpeningHours $openingHour): self
    {
        if (!$this->openingHours->contains($openingHour)) {
            $this->openingHours[] = $openingHour;
            $openingHour->setAdmin($this);
        }

        return $this;
    }

    public function removeOpeningHour(OpeningHours $openingHour): self
    {
        if ($this->openingHours->removeElement($openingHour)) {
            // set the owning side to null (unless already changed)
            if ($openingHour->getAdmin() === $this) {
                $openingHour->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setAdmin($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getAdmin() === $this) {
                $service->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Information[]
     */
    public function getInformation(): Collection
    {
        return $this->information;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->information->contains($information)) {
            $this->information[] = $information;
            $information->setAdmin($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->removeElement($information)) {
            // set the owning side to null (unless already changed)
            if ($information->getAdmin() === $this) {
                $information->setAdmin(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->username;
    }

}
