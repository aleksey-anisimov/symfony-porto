<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Actions;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateCommentActionInterface;
use App\Containers\BlogSection\CommentContainer\Models\Comment;
use App\Containers\BlogSection\CommentContainer\Models\Interfaces\CommentInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveCommentTaskInterface;
use App\Containers\BlogSection\CommentContainer\Values\CommentValue;
use App\Ship\Parents\Actions\AbstractAction;

class CreateCommentAction extends AbstractAction implements CreateCommentActionInterface
{
    public function __construct(private SaveCommentTaskInterface $saveCommentTask)
    {
    }

    public function run(CommentValue $commentValue): CommentInterface
    {
        $comment = new Comment(null, $commentValue->text, $commentValue->author, $commentValue->article);

        $this->saveCommentTask->run($comment);

        return $comment;
    }
}