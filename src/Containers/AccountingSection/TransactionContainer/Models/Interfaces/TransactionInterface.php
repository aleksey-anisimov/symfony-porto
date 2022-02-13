<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models\Interfaces;

interface TransactionInterface
{
    public function getId(): string;

    public function getSource(): AccountInterface;

    public function setSource(AccountInterface $source): TransactionInterface;

    public function getDestination(): AccountInterface;

    public function setDestination(AccountInterface $destination): TransactionInterface;

    public function getComment(): string;

    public function setComment(string $comment): TransactionInterface;

    public function getValue(): int; // TODO: refactor it

    public function setValue(int $value): TransactionInterface; // TODO: refactor it
}