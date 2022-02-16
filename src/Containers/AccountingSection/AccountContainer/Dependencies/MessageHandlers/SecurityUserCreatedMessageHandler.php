<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Dependencies\MessageHandlers;

use App\Containers\AccountingSection\AccountContainer\Actions\Interfaces\CreateOrUpdateOwnerActionInterface;
use App\Containers\AccountingSection\AccountContainer\Values\CreateOwnerValue;
use App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages\SecurityUserCreatedMessage;
use App\Ship\Parents\MessageHandlers\AbstractMessageHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SecurityUserCreatedMessageHandler extends AbstractMessageHandler
{
    public function __construct(private CreateOrUpdateOwnerActionInterface $createOrUpdateOwnerAction)
    {
    }

    public function __invoke(SecurityUserCreatedMessage $message)
    {
        $createOwnerValue = new CreateOwnerValue($message->getSecurityUserId());

        $this->createOrUpdateOwnerAction->run($createOwnerValue);
    }
}