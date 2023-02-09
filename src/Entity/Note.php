<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $markedDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dueDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $reminderDate = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    public function __construct()
    {
        $this->createdDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    public function getMarkedDate(): ?\DateTimeInterface
    {
        return $this->markedDate;
    }

    public function setMarkedDate(?\DateTimeInterface $markedDate): self
    {
        $this->markedDate = $markedDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getReminderDate(): ?\DateTimeInterface
    {
        return $this->reminderDate;
    }

    public function setReminderDate(?\DateTimeInterface $reminderDate): self
    {
        $this->reminderDate = $reminderDate;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
