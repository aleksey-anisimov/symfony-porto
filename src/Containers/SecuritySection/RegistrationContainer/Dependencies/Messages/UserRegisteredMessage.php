<?php

declare(strict_types=1);

namespace App\Containers\SecuritySection\RegistrationContainer\Dependencies\Messages;

use App\Ship\Parents\Messages\AbstractMessage;
use Symfony\Component\Uid\Uuid;

class UserRegisteredMessage extends AbstractMessage
{
    public function __construct(private Uuid $id)
    {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }
}