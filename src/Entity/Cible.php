<?php

namespace App\Entity;

use App\Repository\CibleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CibleRepository::class)
 */
class Cible
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nameCode;

    /**
     * @ORM\ManyToOne(targetEntity=Nationality::class, inversedBy="cibles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationality;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class, mappedBy="cible")
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }



    public function __toString()
    {
        return $this->getFirstname().'('.$this->getNationality().')';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getNameCode(): ?string
    {
        return $this->nameCode;
    }

    public function setNameCode(string $nameCode): self
    {
        $this->nameCode = $nameCode;

        return $this;
    }

    public function getNationality(): ?Nationality
    {
        return $this->nationality;
    }

    public function setNationality(?Nationality $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return Collection<int, Mission>
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->addCible($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeCible($this);
        }

        return $this;
    }


}
