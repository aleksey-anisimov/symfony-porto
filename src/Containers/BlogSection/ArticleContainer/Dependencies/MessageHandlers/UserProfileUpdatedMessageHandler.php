<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\GetAuthorByIdActionInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\UserContainer\Dependencies\Messages\UserProfileUpdatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class UserProfileUpdatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(
        private SaveAuthorTaskInterface $saveAuthorTask,
        private GetAuthorByIdActionInterface $getAuthorByIdAction
    ) {
    }

    public function __invoke(UserProfileUpdatedMessage $message)
    {
        $user = $message->getUser();
        $author = $this->getAuthorByIdAction->run($user->id) ?: new Author($user->id);
        $author->setFirstname($user->firstname);

        $this->saveAuthorTask->run($author);
    }
}