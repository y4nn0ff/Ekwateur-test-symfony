<?php declare(strict_types=1);

namespace App\Domain\Shared\Error;

class Error
{
    private $fieldName;
    private $message;
    private $code;

    public function __construct(string $fieldName, string $message, int $code = null)
    {
        $this->fieldName = $fieldName;
        $this->message = $message;
        $this->code = $code;
    }

    public function __toString()
    {
        return $this->fieldName.':'.$this->message.':'.$this->code;
    }

    public function fieldName(): string
    {
        return $this->fieldName;
    }

    public function message(): string
    {
        return $this->message;
    }
    
    public function getCode(): ?int
    {
        return $this->code;
    }
}
