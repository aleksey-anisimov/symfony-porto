<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\EnableArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class EnableArticleController extends AbstractApiController
{
    private EnableArticleActionInterface $enableArticleAction;

    public function __construct(EnableArticleActionInterface $enableArticleAction)
    {
        $this->enableArticleAction = $enableArticleAction;
    }

    public function __invoke(Article $data): void
    {
        $this->enableArticleAction->run($data);
    }
}
