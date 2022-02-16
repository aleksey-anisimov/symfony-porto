Symfony 6.0 + API Platform + docker + docker-compose

**Commands**

`make init` - run containers

`make stop` - stop containers

Porto pattern https://github.com/Mahmoudz/Porto

**Additional rules for Porto pattern:**

1. Each container should have self models. All data synchronization executes via messages/events.


2. Each container can use classes from other container only in `SomeContainer/Dependencies` folder.

There are additional components in `SomeContainer/Dependencies` folder:
* `InternalApi` - it exposes container api for other containers.
* `InternalClient` - it allows container do request to InternalApi classes of other containers.
* `InternalEventDispatcher` - it dispatches messages/events for other containers.
* `SomeMessage` - message/event that is sent to other containers.
* `SomeMessageHandler` - it processes messages from other containers.
* `SomeModelPublic` - it is public model for exposing to other container. It can be places to `SomeMessage` class or in response of `InternalApi` class.