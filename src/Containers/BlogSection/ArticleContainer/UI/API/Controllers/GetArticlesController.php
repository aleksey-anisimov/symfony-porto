<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetArticlesActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\UI\API\Responses\ArticleResponse;
use App\Ship\Core\Abstracts\Http\JsonResponse;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
#[Route(path: '/api/blog/articles')]
class GetArticlesController extends AbstractApiController
{
    public function __construct(
        private GetArticlesActionInterface $getArticlesAction,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $articles = $this->getArticlesAction->run();

        $response = array_map( // TODO: use data transformer
            static function (ArticleInterface $article) {
                return ArticleResponse::fromModel($article);
            },
            $articles
        );

        return new JsonResponse($response);
    }
}
