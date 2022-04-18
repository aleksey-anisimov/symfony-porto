<?php

declare(strict_types=1);

namespace App\Ship\Core\DataTransformers;

use App\Ship\Parents\Models\AbstractModel;
use App\Ship\Parents\Resources\AbstractResource;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DataTransformer
{
    public function __construct(private NormalizerInterface $normalizer, private DenormalizerInterface $denormalizer)
    {
    }

    public function modelToResource(AbstractModel $model, string $resourceClass): AbstractResource
    {
        $data = $this->normalizer->normalize($model);

        return $this->denormalizer->denormalize($data, $resourceClass);
    }
}