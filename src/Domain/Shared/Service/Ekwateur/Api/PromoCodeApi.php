<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Api;
use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilderInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\PromoCode;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
* This API allowes to acces to promo code end point
**/
class PromoCodeApi implements PromoCodeApiInterface{
    use \App\Domain\Shared\Service\Ekwateur\Api\ListTrait;
    
    const method = "promoCodeList";
    private $clientHttp, $url;
    public function __construct(HttpClientInterface $clientHttp, string $url) {
        $this->clientHttp = $clientHttp;
        $this->url = $url;
    }

    
    public function hydrateItem($item) {
        return new PromoCode(
            $item['code'],
            $item['discountValue'],
            new \DateTime($item['endDate'])
        );
    }
}

