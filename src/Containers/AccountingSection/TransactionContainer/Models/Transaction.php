<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Containers\AccountingSection\TransactionContainer\Models\Interfaces\TransactionInterface;
use App\Ship\Parents\Models\AbstractModel;
use App\Ship\Parents\Models\Interfaces\AccountInterface;
use Symfony\Component\Uid\Uuid;

class Transaction extends AbstractModel implements TransactionInterface
{
    private Uuid $id;

    private AccountInterface $source;

    private AccountInterface $destination;

    private string $comment = '';

    private int $value; // TODO: refactor it

    public function __construct(?Uuid $id = null)
    {
        $this->id = $id ?: Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getSource(): AccountInterface
    {
        return $this->source;
    }

    public function setSource(AccountInterface $source): TransactionInterface
    {
        $this->source = $source;

        return $this;
    }

    public function getDestination(): AccountInterface
    {
        return $this->destination;
    }

    public function setDestination(AccountInterface $destination): TransactionInterface
    {
        $this->destination = $destination;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): TransactionInterface
    {
        $this->comment = $comment;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): TransactionInterface
    {
        $this->value = $value;

        return $this;
    }
}