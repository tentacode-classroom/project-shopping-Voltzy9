<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Peripheral", mappedBy="category")
     */
    private $peripherals;

    public function __construct()
    {
        $this->peripherals = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Peripheral[]
     */
    public function getPeripherals(): Collection
    {
        return $this->peripherals;
    }

    public function addPeripheral(Peripheral $peripheral): self
    {
        if (!$this->peripherals->contains($peripheral)) {
            $this->peripherals[] = $peripheral;
            $peripheral->setCategory($this);
        }

        return $this;
    }

    public function removePeripheral(Peripheral $peripheral): self
    {
        if ($this->peripherals->contains($peripheral)) {
            $this->peripherals->removeElement($peripheral);
            // set the owning side to null (unless already changed)
            if ($peripheral->getCategory() === $this) {
                $peripheral->setCategory(null);
            }
        }

        return $this;
    }
}
