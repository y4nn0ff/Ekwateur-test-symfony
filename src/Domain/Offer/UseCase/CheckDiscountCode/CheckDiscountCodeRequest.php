<?php

declare(strict_types=1);

namespace App\Domain\Offer\UseCase\CheckDiscountCode;

class CheckDiscountCodeRequest
{
    /**
     * @var string
     **/
    public $promoCode;
    public function withPromoCode(string $promoCode): self
    {
        $this->promoCode = $promoCode;
        return $this;
    }
}
