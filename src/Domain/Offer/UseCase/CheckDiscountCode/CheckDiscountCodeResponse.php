<?php declare(strict_types=1);

namespace App\Domain\Offer\UseCase\CheckDiscountCode;

class CheckDiscountCodeResponse{
    use \App\Domain\Shared\Traits\Response;
    
    /**
    * @var string $promoCode 
    **/
    public $promoCode;
    
    /**
    * @var \DateTime $endDate 
    **/
    public $endDate;
    
    /**
    * @var float $discountValue 
    **/
    public $discountValue;
    
    /**
    * @var array $offers<string>
    **/
    public $offers;
    public function addPromoCode(string $promoCode) : void{
        $this->promoCode = $promoCode;
    }
    
    public function addEndDate(\DateTime $endDate) : void{
        $this->endDate = $endDate;
    }
    
    public function addDiscountValue(float $discountValue) : void{
        $this->discountValue = $discountValue;
    }
    
    public function addCompatibleOfferList(array $offers) : void{
        $this->offers[] = $offers;
    }
}