<?php declare(strict_types=1);

namespace App\Domain\Shared\Error;

class Notification
{
    private $errors = [];

    public function addError(string $fieldName, string $error, int $code = null)
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

    public function hasError()
    {
        return count($this->errors) > 0;
    }
}
