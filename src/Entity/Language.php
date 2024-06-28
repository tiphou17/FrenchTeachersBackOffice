<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    public function __tostring(): string
    {
        return $this->name;
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, TeacherLanguage>
     */
    #[ORM\OneToMany(targetEntity: TeacherLanguage::class, mappedBy: 'language')]
    private Collection $teacherLanguages;

    public function __construct()
    {
        $this->teacherLanguages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, TeacherLanguage>
     */
    public function getTeacherLanguages(): Collection
    {
        return $this->teacherLanguages;
    }

    public function addTeacherLanguage(TeacherLanguage $teacherLanguage): static
    {
        if (!$this->teacherLanguages->contains($teacherLanguage)) {
            $this->teacherLanguages->add($teacherLanguage);
            $teacherLanguage->setLanguage($this);
        }

        return $this;
    }

    public function removeTeacherLanguage(TeacherLanguage $teacherLanguage): static
    {
        if ($this->teacherLanguages->removeElement($teacherLanguage)) {
            // set the owning side to null (unless already changed)
            if ($teacherLanguage->getLanguage() === $this) {
                $teacherLanguage->setLanguage(null);
            }
        }

        return $this;
    }
}
