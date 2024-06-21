<?php

namespace App\Entity;

use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $video_path = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hook_sentence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $calendar_path = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone_number = null;

    /**
     * @var Collection<int, Product>
     */
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'teacher')]
    private Collection $products;

    /**
     * @var Collection<int, TeacherLanguage>
     */
    #[ORM\OneToMany(targetEntity: TeacherLanguage::class, mappedBy: 'teacher', orphanRemoval: true)]
    private Collection $teacherLanguages;

    public function __construct()
    {
        $this->products = new ArrayCollection();
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getVideoPath(): ?string
    {
        return $this->video_path;
    }

    public function setVideoPath(?string $video_path): static
    {
        $this->video_path = $video_path;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getHookSentence(): ?string
    {
        return $this->hook_sentence;
    }

    public function setHookSentence(?string $hook_sentence): static
    {
        $this->hook_sentence = $hook_sentence;

        return $this;
    }

    public function getCalendarPath(): ?string
    {
        return $this->calendar_path;
    }

    public function setCalendarPath(?string $calendar_path): static
    {
        $this->calendar_path = $calendar_path;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setTeacher($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getTeacher() === $this) {
                $product->setTeacher(null);
            }
        }

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
            $teacherLanguage->setTeacher($this);
        }

        return $this;
    }

    public function removeTeacherLanguage(TeacherLanguage $teacherLanguage): static
    {
        if ($this->teacherLanguages->removeElement($teacherLanguage)) {
            // set the owning side to null (unless already changed)
            if ($teacherLanguage->getTeacher() === $this) {
                $teacherLanguage->setTeacher(null);
            }
        }

        return $this;
    }
}
