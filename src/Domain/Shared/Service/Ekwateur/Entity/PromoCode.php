<?php

declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Entity;

class PromoCode implements PromoCodeInterface
{
    /** @var string $code **/
    private $code;
    /** @var float $discountValue **/
    private $discountValue;
    /** @var \DateTime $endDate **/
    private $endDate;

    public function __construct(
        string $code,
        float $discountValue,
        \DateTime $endDate
    ) {
        $this->code = $code;
        $this->discountValue = $discountValue;
        $this->endDate = $endDate;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDiscountValue(): float
    {
        return $this->discountValue;
    }

    public function getEndDate(): \DateTime
    {
        return $this->endDate;
    }
}
