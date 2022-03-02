<?php

namespace App\Entity;

use App\Repository\TypePlanqueRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePlanqueRepository::class)
 */
class TypePlanque
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Planque::class, mappedBy="type", cascade={"persist", "remove"})
     */
    private $planque;

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPlanque(): ?Planque
    {
        return $this->planque;
    }

    public function setPlanque(Planque $planque): self
    {
        // set the owning side of the relation if necessary
        if ($planque->getType() !== $this) {
            $planque->setType($this);
        }

        $this->planque = $planque;

        return $this;
    }
}
