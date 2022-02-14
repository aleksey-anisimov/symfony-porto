<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages\SecurityUserCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SecurityUserCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private SaveAuthorTaskInterface $saveAuthorTask)
    {
    }

    public function __invoke(SecurityUserCreatedMessage $message)
    {
        // TODO: use actions like in controllers
        $author = new Author($message->getSecurityUserId());

        $this->saveAuthorTask->run($author);
    }
}