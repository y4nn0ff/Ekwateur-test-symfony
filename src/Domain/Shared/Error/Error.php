<?php

declare(strict_types=1);

namespace App\Domain\Shared\Error;

class Error
{
    /**
    * @var string $fieldName
    **/
    private $fieldName;
    /**
    * @var string $message
    **/
    private $message;
    /**
    * @var int|null $code
    **/
    private $code;

    public function __construct(string $fieldName, string $message, int $code = null)
    {
        $this->fieldName = $fieldName;
        $this->message = $message;
        $this->code = $code;
    }

    public function __toString(): string
    {
        return $this->getError();
    }

    public function getError(): string
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
