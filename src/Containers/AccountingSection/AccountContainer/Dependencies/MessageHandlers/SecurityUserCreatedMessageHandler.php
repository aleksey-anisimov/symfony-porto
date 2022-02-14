<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\MessageHandlers;

use App\Containers\AccountingSection\AccountContainer\Models\Owner;
use App\Containers\AccountingSection\AccountContainer\Tasks\Interfaces\SaveOwnerTaskInterface;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages\SecurityUserCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SecurityUserCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private SaveOwnerTaskInterface $saveAuthorTask)
    {
    }

    public function __invoke(SecurityUserCreatedMessage $message)
    {
        // TODO: use actions like in controllers
        $owner = new Owner($message->getSecurityUserId());

        $this->saveAuthorTask->run($owner);
    }
}