<?php

namespace App\Entity;

use App\Repository\TeacherLanguageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherLanguageRepository::class)]
class TeacherLanguage
{
    public function __tostring(): string
    {
        return (string) $this->language;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(inversedBy: 'teacherLanguages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teacher $teacher = null;

    #[ORM\ManyToOne(inversedBy: 'teacherLanguages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Language $language = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeacher(): ?Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(?Teacher $teacher): static
    {
        $this->teacher = $teacher;

        return $this;
    }

    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    public function setLanguage(?Language $language): static
    {
        $this->language = $language;

        return $this;
    }
}
