<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    public function __tostring(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $firstname = null;

    #[ORM\Column(length: 40)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    /**
     * @var Collection<int, Order>
     */
    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'user')]
    private Collection $orders;

    /**
     * @var Collection<int, LessonsRemaining>
     */
    #[ORM\OneToMany(targetEntity: LessonsRemaining::class, mappedBy: 'user')]
    private Collection $lessonsRemainings;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->lessonsRemainings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): static
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): static
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LessonsRemaining>
     */
    public function getLessonsRemainings(): Collection
    {
        return $this->lessonsRemainings;
    }

    public function addLessonsRemaining(LessonsRemaining $lessonsRemaining): static
    {
        if (!$this->lessonsRemainings->contains($lessonsRemaining)) {
            $this->lessonsRemainings->add($lessonsRemaining);
            $lessonsRemaining->setUser($this);
        }

        return $this;
    }

    public function removeLessonsRemaining(LessonsRemaining $lessonsRemaining): static
    {
        if ($this->lessonsRemainings->removeElement($lessonsRemaining)) {
            // set the owning side to null (unless already changed)
            if ($lessonsRemaining->getUser() === $this) {
                $lessonsRemaining->setUser(null);
            }
        }

        return $this;
    }
}
