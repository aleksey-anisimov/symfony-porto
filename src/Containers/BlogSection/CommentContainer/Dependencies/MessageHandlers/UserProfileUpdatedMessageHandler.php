<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\CommentContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\CommentContainer\Actions\Interfaces\CreateOrUpdateAuthorActionInterface;
use App\Containers\BlogSection\CommentContainer\Values\AuthorValue;
use App\Containers\UserContainer\Dependencies\Messages\UserProfileUpdatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class UserProfileUpdatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private CreateOrUpdateAuthorActionInterface $createOrUpdateAuthorAction)
    {
    }

    public function __invoke(UserProfileUpdatedMessage $message)
    {
        $user = $message->getUser();
        $authorValue = new AuthorValue();
        $authorValue->id = $user->id;
        $authorValue->firstname = $user->firstname;

        $this->createOrUpdateAuthorAction->run($authorValue);
    }
}