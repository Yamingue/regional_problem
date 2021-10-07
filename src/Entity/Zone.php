<?php

namespace App\Entity;

use App\Repository\ZoneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZoneRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Zone
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
    private $update_at;

    /**
     * @ORM\ManyToMany(targetEntity=Problem::class, mappedBy="zone")
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

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeInterface $update_at): self
    {
        $this->update_at = $update_at;

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
            $problem->addZone($this);
        }

        return $this;
    }

    public function removeProblem(Problem $problem): self
    {
        if ($this->problems->removeElement($problem)) {
            $problem->removeZone($this);
        }

        return $this;
    }
    /**
     * @ORM\PrePersist
     */
    function persiste()
    {
        $this->create_at = new \DateTime();
        $this->update_at = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    function update()
    {
        $this->update_at = new \DateTime();
    }

    public function __toString(){
        return $this->name;
    }
}
