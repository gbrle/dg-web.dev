<?php

namespace App\Component\Metadata;

use Doctrine\ORM\Mapping as ORM;

trait Metadata
{
    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $updatedAt = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $deletedAt = null;

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

    public function populateMetadata(MetadataInterface $metadataClass): self
    {
        $this->createdAt = $metadataClass->getCreatedAt();
        $this->updatedAt = $metadataClass->getUpdatedAt();
        $this->deletedAt = $metadataClass->getDeletedAt();

        return $this;
    }
}
