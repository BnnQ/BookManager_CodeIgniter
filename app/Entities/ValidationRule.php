<?php

namespace Entities;

class ValidationRule
{
    public function __construct(public bool $validationExpression, public string $invalidationErrorMessage)
    {
        //empty
    }
}