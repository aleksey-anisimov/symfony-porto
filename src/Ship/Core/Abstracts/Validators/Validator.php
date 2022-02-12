<?php

declare(strict_types=1);

namespace App\Ship\Core\Abstracts\Validators;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\GroupSequence;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Mapping\MetadataInterface;
use Symfony\Component\Validator\Validator\ContextualValidatorInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidatorInterface;

class Validator implements ValidatorInterface
{
    public function __construct(private SymfonyValidatorInterface $symfonyValidator)
    {
    }

    public function getMetadataFor(mixed $value): MetadataInterface
    {
        return $this->symfonyValidator->getMetadataFor($value);
    }

    public function hasMetadataFor(mixed $value): bool
    {
        return $this->symfonyValidator->hasMetadataFor($value);
    }

    public function validate(
        mixed $value,
        array|Constraint $constraints = null,
        array|GroupSequence|string $groups = null
    ): ConstraintViolationListInterface {
        return $this->symfonyValidator->validate($value, $constraints, $groups);
    }

    public function validateProperty(
        object $object,
        string $propertyName,
        array|GroupSequence|string $groups = null
    ): ConstraintViolationListInterface {
        return $this->symfonyValidator->validateProperty($object, $propertyName, $groups);
    }

    public function validatePropertyValue(
        object|string $objectOrClass,
        string $propertyName,
        mixed $value,
        array|GroupSequence|string $groups = null
    ): ConstraintViolationListInterface {
        return $this->symfonyValidator->validatePropertyValue($objectOrClass, $propertyName, $value, $groups);
    }

    public function startContext(): ContextualValidatorInterface
    {
        return $this->symfonyValidator->startContext();
    }

    public function inContext(ExecutionContextInterface $context): ContextualValidatorInterface
    {
        return $this->symfonyValidator->inContext($context);
    }
}