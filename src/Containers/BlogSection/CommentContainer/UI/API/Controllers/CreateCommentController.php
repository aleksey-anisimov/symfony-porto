<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\UI\API\Controllers;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateCommentActionInterface;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
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
    ) {
    }

    public function __invoke(Request $request): CommentInterface
    {
        $createCommentRequest = CreateCommentRequest::createFromRequest($request); // TODO: refactor it
        $this->validator->validate($createCommentRequest);

        $securityUser = $this->getCurrentUser();

        $commentValue = new CommentValue(
            $createCommentRequest->text,
            $securityUser->getId(),
            $createCommentRequest->articleId
        );

        return $this->createCommentAction->run($commentValue);
    }
}
