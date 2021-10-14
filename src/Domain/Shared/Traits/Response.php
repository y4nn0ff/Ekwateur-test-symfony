<?php declare(strict_types=1);

namespace App\Domain\Shared\Traits;
use App\Domain\Shared\Error\Notification;

Trait Response {
    
    private $notification;


    public function __construct()
    {
        $this->notification = new Notification();
    }

    public function addError(string $fieldName, string $error, int $code = null)
    {
        $this->notification->addError($fieldName, $error, $code);
    }

    public function notification(): Notification
    {
        return $this->notification;
    }
    
}