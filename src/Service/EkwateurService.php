<?php

declare(strict_types=1);

namespace App\Service;

use App\Domain\Shared\Service\Ekwateur\EkwateurService as EkwateurServiceInterface;
use App\Domain\Shared\Service\Ekwateur\EkwateurClientInterface;
use App\Domain\Shared\Service\Ekwateur\Api\OfferApi;
use App\Domain\Shared\Service\Ekwateur\Api\PromoCodeApi;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * * This service use to instanciate APIs
 **/
class EkwateurService implements EkwateurServiceInterface
{
    /**
     * @var HttpClientInterface $client 
     **/
    private $client;
    public function __construct(HttpClientInterface $client)
    {
        $this->client  = $client;
    }

    public function getClient(string $ekwateurEndPoint): EkwateurClientInterface
    {
        return new EkwateurClient(
            new OfferApi($this->client, $ekwateurEndPoint),
            new PromoCodeApi($this->client, $ekwateurEndPoint)
        );
    }
}
