<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Api;
use App\Domain\Shared\Service\Ekwateur\Search\EkwateurQueryBuilderInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\OfferInterface;
use App\Domain\Shared\Service\Ekwateur\Entity\PromoCodeInterface;

Trait ListTrait {
    
    /**
    * @return \Iterator<OfferInterface|PromoCodeInterface> 
    **/
    public function list(EkwateurQueryBuilderInterface $query) : \Iterator {
        
        $url = $this->url . self::method . '?' . implode("&",$query->getFilters());
    
        try {
            $response = $this->clientHttp->request('GET',$url);
            
            foreach(json_decode($response->getContent(), true) as $item) {
                yield $this->hydrateItem($item);
            }
        }catch(\Exception | \Error $e) {
            throw new \Exception("Issue during call to : " . $url . $e->getMessage(), $e->getCode());
        }
    }
}