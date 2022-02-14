<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\CommentContainer\Models\Author;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\GetAuthorByIdTaskInterface;
use App\Containers\BlogSection\CommentContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\UserContainer\Dependencies\Messages\UserProfileUpdatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class UserProfileUpdatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(
        private SaveAuthorTaskInterface $saveAuthorTask,
        private GetAuthorByIdTaskInterface $getAuthorByIdTask
    ) {
    }

    public function __invoke(UserProfileUpdatedMessage $message)
    {
        // TODO: use actions like in controllers
        $user = $message->getUser();
        $author = $this->getAuthorByIdTask->run($user->id) ?: new Author($user->id);
        $author->setFirstname($user->firstname);

        $this->saveAuthorTask->run($author);
    }
}