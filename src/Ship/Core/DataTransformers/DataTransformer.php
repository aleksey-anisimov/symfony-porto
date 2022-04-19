<?php

declare(strict_types=1);

namespace App\Ship\Core\DataTransformers;

use App\Ship\Parents\Entities\AbstractEntity;
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

    public function modelToEntity(AbstractModel $model, string $entityClass): AbstractEntity
    {
        $data = $this->normalizer->normalize($model);

        return $this->denormalizer->denormalize($data, $entityClass);
    }

    public function entityToModel(AbstractEntity $entity, string $modelClass): AbstractModel
    {
        $data = $this->normalizer->normalize($entity);

        return $this->denormalizer->denormalize($data, $modelClass);
    }
}