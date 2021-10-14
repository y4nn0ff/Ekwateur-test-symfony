<?php

declare(strict_types=1);

namespace App\Domain\Shared\Error;

class Notification
{
    /**
     * @var array<Error> $errors
     **/
    private $errors = [];

    public function addError(string $fieldName, string $error, int $code = null): self
    {
        $this->errors[] = new Error($fieldName, $error, $code);

        return $this;
    }

    /**
     * @return Error[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasError(): bool
    {
        return count($this->errors) > 0;
    }
}
