<?php

declare(strict_types=1);

namespace App\Containers\AccountingSection\TransactionContainer\Models;

use App\Ship\Core\Generators\UuidGenerator;
use App\Ship\Parents\Models\AbstractModel;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'accounting_section_transaction_container_transaction')]
class Transaction extends AbstractModel
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', unique: true)]
    private string $id;

    #[ORM\ManyToOne(targetEntity: Account::class)]
    #[ORM\JoinColumn(name: 'source_account_id', nullable: false)]
    private Account $source;

    #[ORM\ManyToOne(targetEntity: Account::class)]
    #[ORM\JoinColumn(name: 'source_destination_id', nullable: false)]
    private Account $destination;

    #[ORM\Column(type: 'string')]
    private string $comment = '';

    #[ORM\Column(type: 'integer')]
    private int $value; // TODO: refactor it

    public function __construct(?string $id = null)
    {
        $this->id = UuidGenerator::uuidString($id);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSource(): Account
    {
        return $this->source;
    }

    public function setSource(Account $source): Transaction
    {
        $this->source = $source;

        return $this;
    }

    public function getDestination(): Account
    {
        return $this->destination;
    }

    public function setDestination(Account $destination): Transaction
    {
        $this->destination = $destination;

        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): Transaction
    {
        $this->comment = $comment;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): Transaction
    {
        $this->value = $value;

        return $this;
    }
}