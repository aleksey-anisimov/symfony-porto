<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\UI\API\Controllers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateArticleActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Interfaces\ArticleInterface;
use App\Containers\BlogSection\ArticleContainer\UI\API\Requests\ArticleCreateRequest;
use App\Containers\BlogSection\ArticleContainer\Values\ArticleValue;
use App\Ship\Core\Abstracts\Validators\ValidatorInterface;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateArticleController extends AbstractApiController
{
    private CreateArticleActionInterface $createArticleAction;

    private ValidatorInterface $validator;

    public function __construct(CreateArticleActionInterface $createArticleAction, ValidatorInterface $validator)
    {
        $this->createArticleAction = $createArticleAction;
        $this->validator = $validator;
    }

    public function __invoke(Request $request): ArticleInterface
    {
        $data = ArticleCreateRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($data);

        $articleValue = new ArticleValue();
        $articleValue->title = $data->title;
        $articleValue->text = $data->text;
        $articleValue->author = $this->getUser();

        return $this->createArticleAction->run($articleValue);
    }
}
