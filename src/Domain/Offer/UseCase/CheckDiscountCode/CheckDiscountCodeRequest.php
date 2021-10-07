<?php

namespace App\Domain\Offer\UseCase\CheckDiscountCode;

class CheckDiscountCodeRequest{
    
    public $promoCode;
    public function withPromoCode($promoCode) {
        $this->promoCode = $promoCode;
        return $this;
    }
}