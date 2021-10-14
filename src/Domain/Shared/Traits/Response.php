<?php declare(strict_types=1);

namespace App\Domain\Shared\Traits;
use App\Domain\Shared\Error\Notification;

Trait Response {
    
    /** @var Notification $notification **/
    private $notification;


    public function __construct()
    {
        $this->notification = new Notification();
    }

    public function addError(string $fieldName, string $error, int $code = null) :void
    {
        $this->notification->addError($fieldName, $error, $code);
    }

    public function notification(): Notification
    {
        return $this->notification;
    }
    
}