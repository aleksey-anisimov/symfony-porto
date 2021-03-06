<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Article;
use App\Containers\BlogSection\ArticleContainer\UI\API\Requests\CreateArticleRequest;
use App\Containers\BlogSection\ArticleContainer\Values\CreateArticleValue;
use App\Ship\Core\Abstracts\Validators\ValidatorInterface;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateArticleController extends AbstractApiController
{
    public function __construct(
        private CreateArticleActionInterface $createArticleAction,
        private ValidatorInterface $validator,
    ) {
    }

    public function __invoke(Request $request): Article
    {
        $createArticleRequest = CreateArticleRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($createArticleRequest);

        $securityUser = $this->getCurrentUser();

        $articleValue = new CreateArticleValue(
            $createArticleRequest->title,
            $createArticleRequest->text,
            $securityUser->getId()
        );

        return $this->createArticleAction->run($articleValue);
    }
}
