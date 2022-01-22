<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Requests;

use App\Ship\Parents\Requests\AbstractRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleCreateRequest extends AbstractRequest
{
    #[Assert\NotBlank]
    public ?string $title = null;

    #[Assert\NotBlank]
    public ?string $text = null;

    public static function createFromRequest(Request $request): self
    {
        $content = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $articleCreateRequest = new self();
        $articleCreateRequest->title = $content['title'] ?? null;
        $articleCreateRequest->text = $content['text'] ?? null;

        return $articleCreateRequest;
    }
}
