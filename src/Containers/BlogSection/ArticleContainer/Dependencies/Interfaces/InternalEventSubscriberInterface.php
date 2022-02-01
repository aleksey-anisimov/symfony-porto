<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Events\UserRegistered;

interface InternalEventSubscriberInterface
{
    public function onUserRegistered(UserRegistered $event): void;
}