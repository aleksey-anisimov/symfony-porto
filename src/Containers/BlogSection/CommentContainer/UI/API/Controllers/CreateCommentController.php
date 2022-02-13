<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\UI\API\Controllers;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateCommentActionInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetArticleByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\UI\API\Requests\CreateCommentRequest;
use App\Containers\BlogSection\CommentContainer\Values\CommentValue;
use App\Ship\Core\Abstracts\Validators\ValidatorInterface;
use App\Ship\Parents\Controllers\AbstractApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateCommentController extends AbstractApiController
{
    public function __construct(
        private CreateCommentActionInterface $createCommentAction,
        private ValidatorInterface $validator,
        private GetAuthorByIdTaskInterface $getAuthorByIdTask,
        private GetArticleByIdTaskInterface $getArticleByIdTask,
    ) {
    }

    public function __invoke(Request $request): CommentInterface
    {
        $createCommentRequest = CreateCommentRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($createCommentRequest);

        $commentValue = new CommentValue();
        $commentValue->text = $createCommentRequest->text;

        $securityUser = $this->getCurrentUser();
        $commentValue->author = $this->getAuthorByIdTask->run($securityUser->getId());
        $commentValue->article = $this->getArticleByIdTask->run($createCommentRequest->articleId);

        return $this->createCommentAction->run($commentValue);
    }
}
