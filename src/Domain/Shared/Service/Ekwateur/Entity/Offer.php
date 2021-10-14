<?php declare(strict_types=1);


namespace App\Domain\Shared\Service\Ekwateur\Entity;

class Offer implements OfferInterface {
    private $offerType,
    $offerName,
    $offerDescription,
    $validPromoCodeList;
    
    public function __construct(
        string $offerType,
        string $offerName,
        string $offerDescription,
        array $validPromoCodeList
    ) {
        $this->offerType = $offerType;
        $this->offerName = $offerName;
        $this->offerDescription = $offerDescription;
        $this->validPromoCodeList = $validPromoCodeList;
    }
    
    public function getOfferType() {
        return $this->offerType;
    }
    
    public function getOfferName() {
        return $this->offerName;
    }
    
    public function getOfferDescription() {
        return $this->offerDescription;
    }
    
    public function getValidPromoCodeList() {
        return $this->validPromoCodeList;
    }
}