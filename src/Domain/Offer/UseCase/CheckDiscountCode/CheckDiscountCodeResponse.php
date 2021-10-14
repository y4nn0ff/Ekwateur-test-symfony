<?php declare(strict_types=1);

namespace App\Domain\Offer\UseCase\CheckDiscountCode;
use App\Domain\Shared\Service\Ekwateur\Entity\OfferInterface;

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
    * @var array<OfferInterface> $offers
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
    
    /**
     * @param array<OfferInterface> $offers
     */
    public function addCompatibleOfferList(array $offers) : void{
        $this->offers = $offers;
    }
}