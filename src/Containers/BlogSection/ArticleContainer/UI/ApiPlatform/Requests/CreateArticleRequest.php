<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\ApiPlatform\Requests;

use App\Ship\Parents\Requests\AbstractRequest;
use Symfony\Component\Validator\Constraints as Assert;

class CreateArticleRequest extends AbstractRequest
{
    #[Assert\NotBlank]
    public ?string $title = null;

    #[Assert\NotBlank]
    public ?string $text = null;

    #[Assert\NotBlank]
    public ?string $authorId = null;
}
