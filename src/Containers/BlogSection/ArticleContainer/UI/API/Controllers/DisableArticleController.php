<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\DisableArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class DisableArticleController extends AbstractApiController
{
    private DisableArticleActionInterface $disableArticleAction;

    public function __construct(DisableArticleActionInterface $disableArticleAction)
    {
        $this->disableArticleAction = $disableArticleAction;
    }

    public function __invoke(Article $data): void
    {
        $this->disableArticleAction->run($data);
    }
}
