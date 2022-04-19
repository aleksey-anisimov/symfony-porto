<?php

declare(strict_types=1);

namespace App\Ship\Core\DataTransformers;

interface NormalizerInterface extends \Symfony\Component\Serializer\Normalizer\NormalizerInterface
{
    public function supportsNormalization(mixed $data, string $format = null, array $context = []);
}