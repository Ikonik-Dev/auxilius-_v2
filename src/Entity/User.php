<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function __construct()
    {
        $this->taughtSessions = new ArrayCollection();
        $this->enrolledSessions = new ArrayCollection();
        $this->progressions = new ArrayCollection();
    }

    #[ORM\Column(length: 180, nullable: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 100)]
    private ?string $password = null;

    #[ORM\Column(length: 100)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?bool $isActive = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'formateur', targetEntity: Session::class)]
    private Collection $taughtSessions;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'students')]
    private Collection $enrolledSessions;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Progression::class)]
    private Collection $progressions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

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

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getTaughtSessions(): Collection
    {
        return $this->taughtSessions;
    }

    public function addTaughtSession(Session $taughtSession): static
    {
        if (!$this->taughtSessions->contains($taughtSession)) {
            $this->taughtSessions->add($taughtSession);
            $taughtSession->setFormateur($this);
        }

        return $this;
    }

    public function removeTaughtSession(Session $taughtSession): static
    {
        if ($this->taughtSessions->removeElement($taughtSession)) {
            // set the owning side to null (unless already changed)
            if ($taughtSession->getFormateur() === $this) {
                $taughtSession->setFormateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getEnrolledSessions(): Collection
    {
        return $this->enrolledSessions;
    }

    public function addEnrolledSession(Session $enrolledSession): static
    {
        if (!$this->enrolledSessions->contains($enrolledSession)) {
            $this->enrolledSessions->add($enrolledSession);
            $enrolledSession->addStudent($this);
        }

        return $this;
    }

    public function removeEnrolledSession(Session $enrolledSession): static
    {
        if ($this->enrolledSessions->removeElement($enrolledSession)) {
            $enrolledSession->removeStudent($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Progression>
     */
    public function getProgressions(): Collection
    {
        return $this->progressions;
    }

    public function addProgression(Progression $progression): static
    {
        if (!$this->progressions->contains($progression)) {
            $this->progressions->add($progression);
            $progression->setUser($this);
        }

        return $this;
    }

    public function removeProgression(Progression $progression): static
    {
        if ($this->progressions->removeElement($progression)) {
            // set the owning side to null (unless already changed)
            if ($progression->getUser() === $this) {
                $progression->setUser(null);
            }
        }

        return $this;
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }
}
