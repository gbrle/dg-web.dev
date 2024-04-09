<?php

declare(strict_types=1);

namespace App\Component\Metadata;

use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Bundle\SecurityBundle\Security;

class MetadataListener
{
    public function __construct(private Security $security)
    {
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            if ($entity->getCreatedAt() === null) {
                $entity->setCreatedAt(new \DateTime());
            }

            $object = $args->getObject();
            if ($object instanceof MetadataInterface && $this->security->getUser()) {
                $object->setCreatedBy($this->security->getUser());
                $object->setUpdatedBy($this->security->getUser());
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            $entity->setUpdatedAt(new \DateTime());
        }

        $object = $args->getObject();
        if ($object instanceof MetadataInterface && $this->security->getUser()) {
            $object->setCreatedBy($this->security->getUser());
            $object->setUpdatedBy($this->security->getUser());
        }
    }

    public function preRemove(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            $entity->setDeletedAt(new \DateTime());
        }

        $object = $args->getObject();
        if ($object instanceof MetadataInterface && $this->security->getUser()) {
            $object->setUpdatedBy($this->security->getUser());
            $object->setDeletedBy($this->security->getUser());
        }
    }
}
