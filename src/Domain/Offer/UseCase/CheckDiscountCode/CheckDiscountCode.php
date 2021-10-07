<?php 

namespace App\Domain\Offer\UseCase\CheckDiscountCode;
use App\Domain\Shared\Service\Ekwateur\EkwateurService;
use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilder;

/**
* This use cas check if promo code is valid.
* Rules : if promo code isn't expired and is present into an offer, this one is valid
* otherwise it rises an error
**/
class CheckDiscountCode {
    
    private $ekwateurService;
    
    public function __construct(EkwateurService $ekwateurService) {
        $this->ekwateurService = $ekwateurService;
    }
    
    public function execute(CheckDiscountCodeRequest $request, CheckDiscountCodeResponse $response) {
        
        $promoCode = null;
        $offers = [];
        $client = $this->ekwateurService->getClient($_ENV['EKWATEUR_END_POINT']);
        //We get promocode from API
        
        $query = new EkwateurQueryBuilder();
        $query->addFilter('code', '=' , $request->promoCode);
        try {
            $results = $client->getPromoCodeApi()->list($query);
        }catch(\Exception | \Error $e) {
            $response->addError("promocode", $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
        }
        
        foreach($results as $result){
            $promoCode = $result;
            break;
        }
        
        if($promoCode == null) {
            $response->addError("promocode", sprintf("The promocode '%s' doen't exist", $request->promoCode));
        } else {
        
            $today = new \DateTime("now");
            if($today > $promoCode->getEndDate()) {
                $response->addError("promocode", sprintf("The promocode '%s' is expired", $request->promoCode));
            }else {
                
                //We get available offer for the code
                $query = new EkwateurQueryBuilder();
                $query->addFilter('validPromoCodeList', '=' , $request->promoCode);
                try {
                    $results = $client->getOfferApi()->list($query);
                }catch(\Exception | \Error $e) {
                    $response->addError("promocode", $e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine());
                }
                foreach($results as $offer){
                    $offers[] = $offer;
                }
                
                if(count($offers) > 0) {
                    $response->addPromoCode($request->promoCode);
                    $response->addEndDate($promoCode->getEndDate());
                    $response->addDiscountValue($promoCode->getDiscountValue());
                    $response->addCompatibleOfferList($offers);
                } else {
                    $response->addError("offer", sprintf("No Offer is available for promocode '%s'", $request->promoCode));
                }        
            }
        }
    }
}