<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Entity;

interface OfferInterface
{
    public function getOfferType(): string;

    public function getOfferName(): string;

    public function getOfferDescription(): string;

    /**
     * @return array<PromoCode>
     **/
    public function getValidPromoCodeList(): array;
}
