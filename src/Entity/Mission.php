<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as MyConstraint;

/**
 * @ORM\Entity(repositoryClass=MissionRepository::class)
 */
class Mission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom de code est obligatoire")
     */
    private $nomCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le titre est obligatoire")
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;



    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToMany(targetEntity=Planque::class, inversedBy="missions")
     * @MyConstraint\IsPlanquePays()
     */
    private $planque;

    /**
     * @ORM\ManyToOne(targetEntity=Speciality::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     * @MyConstraint\IsAgentSpecialite()
     */
    private $speciality;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     * @MyConstraint\IsContactNationality
     * @MyConstraint\IsPlanquePays()
     */
    private $pays;

    /**
     * @ORM\ManyToMany(targetEntity=Agent::class, inversedBy="missions")
     * @MyConstraint\IsCibleNationalite()Nationality
     * @MyConstraint\IsAgentSpecialite()
     */
    private $agent;

    /**
     * @ORM\ManyToMany(targetEntity=Contact::class, inversedBy="missions")
     * @MyConstraint\IsContactNationality
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity=Cible::class, inversedBy="missions")

     */
    private $cible;

    /**
     * @ORM\ManyToMany(targetEntity=Test::class, inversedBy="missions")
     * @MyConstraint\IsCibleNationalite()
     */
    private $test;





    public function __construct()
    {

        $this->planque = new ArrayCollection();
        $this->agent = new ArrayCollection();
        $this->contact = new ArrayCollection();
        $this->cible = new ArrayCollection();
        $this->test = new ArrayCollection();

    }
    public function __toString()
    {
        return $this->getTitre();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCode(): ?string
    {
        return $this->nomCode;
    }

    public function setNomCode(string $nomCode): self
    {
        $this->nomCode = $nomCode;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }





    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Planque>
     */
    public function getPlanque(): Collection
    {
        return $this->planque;
    }

    public function addPlanque(Planque $planque): self
    {
        if (!$this->planque->contains($planque)) {
            $this->planque[] = $planque;
        }

        return $this;
    }

    public function removePlanque(Planque $planque): self
    {
        $this->planque->removeElement($planque);

        return $this;
    }

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection<int, Agent>
     */
    public function getAgent(): Collection
    {
        return $this->agent;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agent->contains($agent)) {
            $this->agent[] = $agent;
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        $this->agent->removeElement($agent);

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact[] = $contact;
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        $this->contact->removeElement($contact);

        return $this;
    }

    /**
     * @return Collection<int, Cible>
     */
    public function getCible(): Collection
    {
        return $this->cible;
    }

    public function addCible(Cible $cible): self
    {
        if (!$this->cible->contains($cible)) {
            $this->cible[] = $cible;
        }

        return $this;
    }

    public function removeCible(Cible $cible): self
    {
        $this->cible->removeElement($cible);

        return $this;
    }

    /**
     * @return Collection<int, Test>
     */
    public function getTest(): Collection
    {
        return $this->test;
    }

    public function addTest(Test $test): self
    {
        if (!$this->test->contains($test)) {
            $this->test[] = $test;
        }

        return $this;
    }

    public function removeTest(Test $test): self
    {
        $this->test->removeElement($test);

        return $this;
    }



}
