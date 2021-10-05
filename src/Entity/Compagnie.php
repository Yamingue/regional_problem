<?php

namespace App\Entity;

use App\Repository\CompagnieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompagnieRepository::class)
 */
class Compagnie
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
     * @ORM\Column(type="datetime")
     */
    private $create_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $update_ate;

    /**
     * @ORM\OneToMany(targetEntity=Problem::class, mappedBy="compagnie", orphanRemoval=true)
     */
    private $problems;

    public function __construct()
    {
        $this->problems = new ArrayCollection();
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

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getUpdateAte(): ?\DateTimeInterface
    {
        return $this->update_ate;
    }

    public function setUpdateAte(\DateTimeInterface $update_ate): self
    {
        $this->update_ate = $update_ate;

        return $this;
    }

    /**
     * @return Collection|Problem[]
     */
    public function getProblems(): Collection
    {
        return $this->problems;
    }

    public function addProblem(Problem $problem): self
    {
        if (!$this->problems->contains($problem)) {
            $this->problems[] = $problem;
            $problem->setCompagnie($this);
        }

        return $this;
    }

    public function removeProblem(Problem $problem): self
    {
        if ($this->problems->removeElement($problem)) {
            // set the owning side to null (unless already changed)
            if ($problem->getCompagnie() === $this) {
                $problem->setCompagnie(null);
            }
        }

        return $this;
    }
}
