<?php

declare(strict_types=1);

namespace App\Containers\BlogSection\ArticleContainer\Dependencies;

use App\Containers\BlogSection\ArticleContainer\Dependencies\Interfaces\InternalEventSubscriberInterface;
use App\Containers\BlogSection\ArticleContainer\Models\Author;
use App\Containers\BlogSection\ArticleContainer\Tasks\Interfaces\SaveAuthorTaskInterface;
use App\Containers\UserContainer\Events\UserCreatedEvent;
use App\Ship\Parents\Dependencies\AbstractInternalEventSubscriber;

class InternalEventSubscriber extends AbstractInternalEventSubscriber implements InternalEventSubscriberInterface
{
    public function __construct(private SaveAuthorTaskInterface $saveAuthorTask)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            UserCreatedEvent::class => 'onUserRegistered',
        ];
    }

    public function onUserRegistered(UserCreatedEvent $event): void
    {
        $user = $event->getUser();
        $author = new Author($user->id);

        $this->saveAuthorTask->run($author);
    }
}