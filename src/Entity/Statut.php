<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatutRepository::class)
 */
class Statut
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
    private $nameStatut;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="statut")
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNameStatut();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameStatut(): ?string
    {
        return $this->nameStatut;
    }

    public function setNameStatut(string $nameStatut): self
    {
        $this->nameStatut = $nameStatut;

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
            $mission->setStatut($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getStatut() === $this) {
                $mission->setStatut(null);
            }
        }

        return $this;
    }
}
