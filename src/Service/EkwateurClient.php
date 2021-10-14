<?php declare(strict_types=1);

namespace App\Service;

use App\Domain\Shared\Service\Ekwateur\EkwateurClientInterface;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApiInterface;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApiInterface;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApi;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApi;
/**
* The service allow create APIs object 
**/
class EkwateurClient implements EkwateurClientInterface{
    
    /** @var OfferApiInterface $offerApi **/
    private $offerApi;
    /** @var PromoCodeApiInterface $promoCodeApi **/
    private $promoCodeApi;
    
    public function __construct(
        OfferApiInterface $offerApi,
        PromoCodeApiInterface $promoCodeApi
    ) {
        $this->offerApi = $offerApi;
        $this->promoCodeApi = $promoCodeApi;
    }
    
    public function getOfferApi() : OfferApiInterface {
        return $this->offerApi;
    }
    
    public function getPromoCodeApi() :PromoCodeApiInterface {
        return $this->promoCodeApi;
    }
}