<?php

namespace App\Validator;

use App\Validator\ValidatorInterface;

abstract class Validator implements ValidatorInterface
{
    protected array $error = [];

    public function __construct(private array $data)
    {
    }

    public function getData()
    {
        return $this->data;
    }

    abstract public function validate(): bool;

    public function getErrors(): array
    {
        return $this->error;
    }
}
