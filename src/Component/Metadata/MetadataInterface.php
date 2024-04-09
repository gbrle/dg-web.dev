<?php

namespace App\Component\Metadata;
use Symfony\Component\Security\Core\User\UserInterface;

interface MetadataInterface
{
    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(?\DateTimeInterface $createdAt): self;

    public function getUpdatedAt(): ?\DateTimeInterface;

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self;

    public function getDeletedAt(): ?\DateTimeInterface;

    public function setDeletedAt(?\DateTimeInterface $deletedAt): self;

    public function getCreatedBy(): ?UserInterface;

    public function setCreatedBy(UserInterface $createdAt): self;

    public function getUpdatedBy(): ?UserInterface;

    public function setUpdatedBy(UserInterface $createdAt): self;

    public function getDeletedBy(): ?UserInterface;

    public function setDeletedBy(UserInterface $createdAt): self;
}
