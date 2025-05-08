<?php

namespace App\Validator;

interface ValidatorInterface
{
    public function validate(): bool;
    public function getErrors(): array;
}
