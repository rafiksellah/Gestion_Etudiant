<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniversityRepository::class)]
class University
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'university', targetEntity: Infos::class)]
    private Collection $infos;

    public function __construct()
    {
        $this->infos = new ArrayCollection();
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

    /**
     * @return Collection<int, Infos>
     */
    public function getInfos(): Collection
    {
        return $this->infos;
    }

    public function addInfo(Infos $info): self
    {
        if (!$this->infos->contains($info)) {
            $this->infos->add($info);
            $info->setUniversity($this);
        }

        return $this;
    }

    public function removeInfo(Infos $info): self
    {
        if ($this->infos->removeElement($info)) {
            // set the owning side to null (unless already changed)
            if ($info->getUniversity() === $this) {
                $info->setUniversity(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
