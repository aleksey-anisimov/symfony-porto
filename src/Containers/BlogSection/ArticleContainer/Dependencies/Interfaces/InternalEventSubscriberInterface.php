<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces;

use App\Containers\UserContainer\Events\UserRegisteredEvent;

interface InternalEventSubscriberInterface
{
    public function onUserRegistered(UserRegisteredEvent $event): void;
}