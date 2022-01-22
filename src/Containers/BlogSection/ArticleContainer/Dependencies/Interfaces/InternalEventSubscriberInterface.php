<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Models\Interfaces\UserInterface;

interface InternalEventSubscriberInterface
{
    public function onUserRegistered(UserInterface $user): void;
}