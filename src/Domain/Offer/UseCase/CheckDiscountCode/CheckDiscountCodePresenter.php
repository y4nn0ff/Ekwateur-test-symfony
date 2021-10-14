<?php

declare(strict_types=1);

namespace App\Domain\Offer\UseCase\CheckDiscountCode;

interface CheckDiscountCodePresenter
{
    public function present(CheckDiscountCodeResponse $response): string;
}
