<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\UI\API\Requests;

use App\Ship\Parents\Requests\AbstractRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class CreateCommentRequest extends AbstractRequest
{
    #[Assert\NotBlank]
    public ?string $text = null;

    #[Assert\NotBlank]
    public ?string $articleId = null;

    public static function createFromRequest(Request $request): self
    {
        $content = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $commentCreateRequest = new self();
        $commentCreateRequest->text = $content['text'] ?? null;
        $commentCreateRequest->articleId = $content['article_id'] ?? null;

        return $commentCreateRequest;
    }
}
