<?php

namespace App\Domain\Offer\UseCase\CheckDiscountCode;

class CheckDiscountCodeResponse{
    use \App\Domain\Shared\Traits\Response;
    

    public $promoCode, $endDate,$discountValue,$offers;
    public function addPromoCode(string $promoCode) {
        $this->promoCode = $promoCode;
    }
    
    public function addEndDate(\DateTime $endDate) {
        $this->endDate = $endDate;
    }
    
    public function addDiscountValue(float $discountValue) {
        $this->discountValue = $discountValue;
    }
    
    public function addCompatibleOfferList(array $offers) {
        $this->offers = $offers;
    }
}