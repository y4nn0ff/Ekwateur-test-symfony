<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur;

interface EkwateurService
{
    public function getClient(string $url): EkwateurClientInterface;
}
