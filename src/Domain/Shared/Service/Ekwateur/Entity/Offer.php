<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Entity;

class Offer implements OfferInterface
{
    /**
     * @var string $offerType 
     **/
    private $offerType;
    /**
     * @var string $offerName 
     **/
    private $offerName;
    /**
     * @var string $offerDescription 
     **/
    private $offerDescription;
    /**
     * @var array<PromoCode> $validPromoCodeList 
     **/
    private $validPromoCodeList;

    /**
     * @param array<PromoCode> $validPromoCodeList
     **/
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

    public function getOfferType(): string
    {
        return $this->offerType;
    }

    public function getOfferName(): string
    {
        return $this->offerName;
    }

    public function getOfferDescription(): string
    {
        return $this->offerDescription;
    }

    /**
     * @return array<PromoCode>
     **/
    public function getValidPromoCodeList(): array
    {
        return $this->validPromoCodeList;
    }
}
