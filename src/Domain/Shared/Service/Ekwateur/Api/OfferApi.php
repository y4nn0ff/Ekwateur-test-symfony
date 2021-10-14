<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Api;
use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilderInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\Offer;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
* This API allowes to acces to offer end point
**/
class OfferApi implements OfferApiInterface {
    use \App\Domain\Shared\Service\Ekwateur\Api\ListTrait;
    
    const method = "offerList";
    /** @var HttpClientInterface $clientHttp **/
    private $clientHttp;
    /** @var string $url **/
    private $url;
    public function __construct(HttpClientInterface $clientHttp, string $url) {
        $this->clientHttp = $clientHttp;
        $this->url = $url;
    }

    /**
    * @param array<mixed> $item
    **/
    public function hydrateItem($item) : Offer{

        return new Offer(
            $item['offerType'],
            $item['offerName'],
            $item['offerDescription'],
            $item['validPromoCodeList']
        );
    }
}

