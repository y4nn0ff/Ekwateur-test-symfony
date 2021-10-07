<?php 

namespace App\Domain\Shared\Service\Ekwateur\Api;
use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilderInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\Offer;
use Symfony\Component\HttpClient\CurlHttpClient;

/**
* This API allowes to acces to offer end point
**/
class OfferApi implements OfferApiInterface {
    use \App\Domain\Shared\Service\Ekwateur\Api\ListTrait;
    
    const method = "offerList";
    private $clientHttp, $url;
    public function __construct(CurlHttpClient $clientHttp, string $url) {
        $this->clientHttp = $clientHttp;
        $this->url = $url;
    }

    
    public function hydrateItem($item) {

        return new Offer(
            $item['offerType'],
            $item['offerName'],
            $item['offerDescription'],
            $item['validPromoCodeList']
        );
    }
}

