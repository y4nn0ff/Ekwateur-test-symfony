<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApiInterface;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApiInterface;

interface EkwateurClientInterface {
    public function getOfferApi() : OfferApiInterface;
    
    public function getPromoCodeApi() : PromoCodeApiInterface;
}