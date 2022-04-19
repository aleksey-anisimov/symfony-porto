<?php

declare(strict_types=1);

namespace App\Ship\Core\DataTransformers;

interface DenormalizerInterface extends \Symfony\Component\Serializer\Normalizer\DenormalizerInterface
{
    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []);
}