<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\UI\API\Requests\CreateArticleRequest;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;
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
        private GetAuthorByIdActionInterface $getAuthorByIdAction
    ) {
    }

    public function __invoke(Request $request): ArticleInterface
    {
        $createArticleRequest = CreateArticleRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($createArticleRequest);

        $articleValue = new ArticleValue();
        $articleValue->title = $createArticleRequest->title;
        $articleValue->text = $createArticleRequest->text;

        $securityUser = $this->getCurrentUser();
        $articleValue->author = $this->getAuthorByIdAction->run($securityUser->getId());

        return $this->createArticleAction->run($articleValue);
    }
}
