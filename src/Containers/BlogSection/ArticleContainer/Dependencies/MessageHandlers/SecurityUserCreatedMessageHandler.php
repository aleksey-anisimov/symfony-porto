<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\MessageHandlers;

use App\Containers\BlogSection\ArticleContainer\Actions\Interfaces\CreateOrUpdateAuthorActionInterface;
use App\Containers\BlogSection\ArticleContainer\Values\AuthorValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages\SecurityUserCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SecurityUserCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private CreateOrUpdateAuthorActionInterface $createOrUpdateAuthorAction)
    {
    }

    public function __invoke(SecurityUserCreatedMessage $message)
    {
        $authorValue = new AuthorValue($message->getSecurityUserId());

        $this->createOrUpdateAuthorAction->run($authorValue);
    }
}