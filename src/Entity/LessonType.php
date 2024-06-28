<?php

namespace App\Entity;

use App\Repository\LessonTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonTypeRepository::class)]
class LessonType
{
    public function __tostring(): string
    {
        return $this->session_type . ' ' . $this->durationInMinutes . 'minutes';
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $durationInMinutes = null;

    #[ORM\Column(length: 255)]
    private ?string $session_type = null;

    /**
     * @var Collection<int, Package>
     */
    #[ORM\OneToMany(targetEntity: Package::class, mappedBy: 'type')]
    private Collection $packages;

    public function __construct()
    {
        $this->packages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDurationInMinutes(): ?int
    {
        return $this->durationInMinutes;
    }

    public function setDurationInMinutes(int $durationInMinutes): static
    {
        $this->durationInMinutes = $durationInMinutes;

        return $this;
    }

    public function getSessionType(): ?string
    {
        return $this->session_type;
    }

    public function setSessionType(string $session_type): static
    {
        $this->session_type = $session_type;

        return $this;
    }

    /**
     * @return Collection<int, Package>
     */
    public function getPackages(): Collection
    {
        return $this->packages;
    }

    public function addPackage(Package $package): static
    {
        if (!$this->packages->contains($package)) {
            $this->packages->add($package);
            $package->setType($this);
        }

        return $this;
    }

    public function removePackage(Package $package): static
    {
        if ($this->packages->removeElement($package)) {
            // set the owning side to null (unless already changed)
            if ($package->getType() === $this) {
                $package->setType(null);
            }
        }

        return $this;
    }
}
