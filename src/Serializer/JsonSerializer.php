<?php

declare(strict_types=1);

namespace App\Serializer;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;

class JsonSerializer
{
    private Serializer $serializer;

    public function __construct()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        // l'ordre est important !
        $normalizers = [
            new BackedEnumNormalizer(),
            new DateTimeNormalizer(),
            new ObjectNormalizer($classMetadataFactory),
        ];
        $encoders = [
            new JsonEncoder(),
        ];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param array<string> $groups
     */
    public function serialize(mixed $data, array $groups = []): string
    {
        return $this->serializer->serialize($data, 'json', ['groups' => $groups]);
    }

    /**
     * @param array<string> $context
     */
    public function deserialize(mixed $data, string $type, string $format, array $context = []): mixed
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }
}
