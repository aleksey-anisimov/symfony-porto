<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\AccountContainer\Actions\Interfaces;

interface GetUserWalletsActionInterface
{
    public function run(string $id): array;
}