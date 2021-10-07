<?php 

namespace App\Domain\Offer\UseCase\CheckDiscountCode;


interface CheckDiscountCodePresenter {

    public function present(CheckDiscountCodeResponse $response);

}