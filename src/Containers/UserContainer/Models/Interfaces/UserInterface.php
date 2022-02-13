<?php

declare(strict_types=1);

namespace App\Containers\UserContainer\Models\Interfaces;

interface UserInterface
{
    public function getId(): string;

    public function getEmail(): string;

    public function getFirstname(): string;
}