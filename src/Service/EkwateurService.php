<?php 

namespace App\Service;

use App\Domain\Shared\Service\Ekwateur\EkwateurService as EkwateurServiceInterface;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApi;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApi;
use Symfony\Component\HttpClient\HttpClient;
/**
** This service use to instanciate APIs
**/
class EkwateurService implements EkwateurServiceInterface{
    
    
    public function __construct() {
    }
    
    public function getClient(string $ekwateurEndPoint) {
        $client = HttpClient::create();
        return new EkwateurClient(
            new OfferApi($client,$ekwateurEndPoint),
            new PromoCodeApi($client,$ekwateurEndPoint)
         );
    }

}