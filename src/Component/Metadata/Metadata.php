<?php

namespace App\Component\Metadata;

use App\Entity\Utilisateur;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

trait Metadata
{
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $deletedAt = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'created_by', referencedColumnName: 'id')]
    protected ?UserInterface $createdBy = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'updated_by', referencedColumnName: 'id')]
    protected ?UserInterface $updatedBy = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'deleted_by', referencedColumnName: 'id')]
    protected ?UserInterface $deletedBy = null;

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getCreatedBy(): ?UserInterface
    {
        return $this->createdBy;
    }

    public function setCreatedBy(UserInterface $utilisateur): self
    {
        $this->createdBy = $utilisateur;

        return $this;
    }

    public function getUpdatedBy(): ?UserInterface
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(UserInterface $utilisateur): self
    {
        $this->updatedBy = $utilisateur;

        return $this;
    }

    public function getDeletedBy(): ?UserInterface
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(UserInterface $utilisateur): self
    {
        $this->deletedBy = $utilisateur;

        return $this;
    }

    public function populateMetadata(MetadataInterface $metadataClass): self
    {
        $this->createdAt = $metadataClass->getCreatedAt();
        $this->updatedAt = $metadataClass->getUpdatedAt();
        $this->deletedAt = $metadataClass->getDeletedAt();
        $this->createdBy = $metadataClass->getCreatedBy();
        $this->updatedBy = $metadataClass->getUpdatedBy();
        $this->deletedBy = $metadataClass->getDeletedBy();

        return $this;
    }
}
