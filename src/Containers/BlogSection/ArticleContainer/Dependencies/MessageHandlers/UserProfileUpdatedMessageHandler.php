<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateOrUpdateAuthorActionInterface;
use App\Containers\BlogSection\ArticleContainer\Values\AuthorValue;
use App\Containers\UserContainer\Dependencies\Messages\UserProfileUpdatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class UserProfileUpdatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(
        private CreateOrUpdateAuthorActionInterface $createOrUpdateAuthorAction
    ) {
    }

    public function __invoke(UserProfileUpdatedMessage $message)
    {
        $user = $message->getUser();
        $authorValue = new AuthorValue($user->id, $user->firstname);

        $this->createOrUpdateAuthorAction->run($authorValue);
    }
}