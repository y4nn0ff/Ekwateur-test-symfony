<?php 

namespace App\Service;

use App\Domain\Shared\Service\Ekwateur\EkwateurService as EkwateurServiceInterface;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApiInterface;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApiInterface;

/**
* The service allow create APIs object 
**/
class EkwateurClient implements EkwateurClientInterface{
    
    private $offerApi, $promoCodeApi;
    
    public function __construct(
        OfferApiInterface $offerApi,
        PromoCodeApiInterface $promoCodeApi
    ) {
        $this->offerApi = $offerApi;
        $this->promoCodeApi = $promoCodeApi;
    }
    
    public function getOfferApi() {
        return $this->offerApi;
    }
    
    public function getPromoCodeApi() {
        return $this->promoCodeApi;
    }
}