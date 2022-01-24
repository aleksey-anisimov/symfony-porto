<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Requests;

use App\Ship\Parents\Requests\AbstractRequest;
use Symfony\Component\Validator\Constraints as Assert;

class EditArticleRequest extends AbstractRequest
{
    #[Assert\NotBlank]
    public ?string $text = null;
}
