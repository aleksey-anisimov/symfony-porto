<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataTransformers;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use ApiPlatform\Core\Validator\ValidatorInterface;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Requests\CreateArticleRequest;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;

class ArticleRequestToDtoDataTransformer implements DataTransformerInterface
{
    public function __construct(private ValidatorInterface $validator)
    {
    }

    /**
     * @param CreateArticleRequest $object
     */
    public function transform($object, string $to, array $context = []): CreateArticleValue
    {
        $this->validator->validate($object);

        return new CreateArticleValue($object->title, $object->text, $object->authorId);
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return (
            ($context['operation_type'] === 'collection') &&
            ($context['collection_operation_name'] === 'post') &&
            ($context['input']['class'] === CreateArticleRequest::class) &&
            ($to === ArticleResource::class)
        );
    }
}