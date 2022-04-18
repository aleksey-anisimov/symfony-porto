<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\DataTransformers;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Resources\ArticleResource;
use App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Responses\ArticleResponse;

class ArticleModelToResponseDataTransformer implements DataTransformerInterface
{
    /**
     * @param ArticleResource $object
     */
    public function transform($object, string $to, array $context = []): ArticleResponse
    {
        $response = new ArticleResponse();
        $response->id = $object->id;
        $response->title = $object->title;
        $response->text = $object->text;
        $response->authorId = $object->author->id;

        return $response;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return ($data instanceof ArticleResource) && ($to === ArticleResponse::class);
    }
}