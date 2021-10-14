<?php declare(strict_types=1);


namespace App\Domain\Shared\Service\Ekwateur\Entity;

class PromoCode implements PromoCodeInterface {
    private $code,
    $discountValue,
    $endDate;
    
    public function __construct(
        string $code,
        float $discountValue,
        \DateTime $endDate
    ) {
        $this->code = $code;
        $this->discountValue = $discountValue;
        $this->endDate = $endDate;
    }
    
    public function getCode() {
        return $this->code;
    }
    
    public function getDiscountValue() {
        return $this->discountValue;
    }
    
    public function getEndDate() {
        return $this->endDate;
    }
}