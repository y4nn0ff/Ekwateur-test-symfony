<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Entity;

interface PromoCodeInterface
{
    public function getCode(): string ;

    public function getDiscountValue(): float;

    public function getEndDate(): \DateTime ;
}
