<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies\Messages;

use App\Ship\Parents\Messages\AbstractMessage;

class UserRegisteredMessage extends AbstractMessage
{
    public function __construct(private string $id)
    {
    }

    public function getId(): string
    {
        return $this->id;
    }
}