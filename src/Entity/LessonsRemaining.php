<?php

namespace App\Entity;

use App\Repository\LessonsRemainingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LessonsRemainingRepository::class)]
class LessonsRemaining
{
    public function __tostring(): string
    {
        return 'Reste' . $this->balance . 'avec' . $this->teacher;
    }
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lessonsRemainings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Teacher $teacher = null;

    #[ORM\Column]
    private ?int $balance = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?LessonType $type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
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

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): static
    {
        $this->balance = $balance;

        return $this;
    }

    public function getType(): ?LessonType
    {
        return $this->type;
    }

    public function setType(?LessonType $type): static
    {
        $this->type = $type;

        return $this;
    }
}
