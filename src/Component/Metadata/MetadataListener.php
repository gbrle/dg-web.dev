<?php

declare(strict_types=1);

namespace App\Component\Metadata;

use Doctrine\Persistence\Event\LifecycleEventArgs;

class MetadataListener
{
    public function prePersist(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            if ($entity->getCreatedAt() === null) {
                $entity->setCreatedAt(new \DateTime());
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            $entity->setUpdatedAt(new \DateTime());
        }
    }

    public function preRemove(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if ($entity instanceof MetadataInterface) {
            $entity->setDeletedAt(new \DateTime());
        }
    }
}
