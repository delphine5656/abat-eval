<?php

namespace App\Entity;

use App\Repository\NationalityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NationalityRepository::class)
 */
class Nationality
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
    private $nameNationality;

    /**
     * @ORM\OneToMany(targetEntity=Contact::class, mappedBy="nationality")
     */
    private $contacts;

    /**
     * @ORM\OneToMany(targetEntity=Cible::class, mappedBy="nationality")
     */
    private $cibles;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="nationality")
     */
    private $agents;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->cibles = new ArrayCollection();
        $this->agents = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getNameNationality();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameNationality(): ?string
    {
        return $this->nameNationality;
    }

    public function setNameNationality(string $nameNationality): self
    {
        $this->nameNationality = $nameNationality;

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setNationality($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getNationality() === $this) {
                $contact->setNationality(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cible>
     */
    public function getCibles(): Collection
    {
        return $this->cibles;
    }

    public function addCible(Cible $cible): self
    {
        if (!$this->cibles->contains($cible)) {
            $this->cibles[] = $cible;
            $cible->setNationality($this);
        }

        return $this;
    }

    public function removeCible(Cible $cible): self
    {
        if ($this->cibles->removeElement($cible)) {
            // set the owning side to null (unless already changed)
            if ($cible->getNationality() === $this) {
                $cible->setNationality(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Agent>
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents[] = $agent;
            $agent->setNationality($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getNationality() === $this) {
                $agent->setNationality(null);
            }
        }

        return $this;
    }
}
