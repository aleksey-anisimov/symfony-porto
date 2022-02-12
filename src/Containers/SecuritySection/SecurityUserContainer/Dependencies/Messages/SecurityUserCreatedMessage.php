<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\SecurityUserContainer\Dependencies\Messages;

use App\Ship\Parents\Messages\AbstractMessage;
use Symfony\Component\Uid\Uuid;

class SecurityUserCreatedMessage extends AbstractMessage
{
    public function __construct(private Uuid $id)
    {
    }

    public function getSecurityUserId(): Uuid
    {
        return $this->id;
    }
}