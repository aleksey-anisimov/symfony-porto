<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages;

use App\Ship\Parents\Messages\AbstractMessage;

class SecurityUserCreatedMessage extends AbstractMessage
{
    public function __construct(private string $id)
    {
    }

    public function getSecurityUserId(): string
    {
        return $this->id;
    }
}