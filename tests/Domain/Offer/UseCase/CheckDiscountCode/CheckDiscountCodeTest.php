<?php 

namespace App\Tests\Domain\Offer\UseCase\CheckDiscountCode;

use PHPUnit\Framework\TestCase;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodePresenter;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodeResponse;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodeRequest;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCode;
use App\Service\EkwateurService;
use App\Tests\Service\HttpClient;

class CheckDiscountCodeTest extends TestCase implements CheckDiscountCodePresenter {
    
    protected function setUp() :void
    {
        $this->checkDiscountCode = new CheckDiscountCode(
            new EkwateurService(
                new HttpClient(
                    [
                        'offerList' => [
                            [
                                "offerType" => "WOOD",
                                "offerName" => "EKWAW2000",
                                "offerDescription" =>  "Une offre du envoie du bois",
                                "validPromoCodeList" =>  [
                                  "EKWA_WELCOME",
                                  "ALL_2000",
                                  "WOODY",
                                ]
                            ]
                        ],
                        'promoCodeList' => [
                            [
                                "code"=> "EKWA_WELCOME",
                                "discountValue"=> 2,
                                "endDate"=> "2019-10-04"
                            ],
                            [
                                "code"=> "ALL_2000",
                                "discountValue"=> 2.75,
                                "endDate"=> "2023-03-05"
                            ],
                            [
                                "code"=> "WOODY_WOODPECKER",
                                "discountValue"=> 1,
                                "endDate"=> "2022-03-05"
                            ]
                        ]
                    ]
                )
            )
        );
        $this->checkDiscountCodeRequest = new CheckDiscountCodeRequest();
        $this->checkDiscountCodeResponse = new CheckDiscountCodeResponse();
    }
    public function present(CheckDiscountCodeResponse $response) {
        
    }
    
    public function test_it_returns_promocode_not_exists() {
        $this->checkDiscountCode->execute(
            $this->checkDiscountCodeRequest->withPromoCode("TEST"),
            $this->checkDiscountCodeResponse
        );
        
        foreach($this->checkDiscountCodeResponse->notification()->getErrors() as $error) {
            $this->assertSame("The promocode 'TEST' doen't exist", $error->message());
        }
        $this->assertTrue($this->checkDiscountCodeResponse->notification()->hasError());
        
    }
    
    public function test_it_returns_promocode_is_expired() {
        $this->checkDiscountCode->execute(
            $this->checkDiscountCodeRequest->withPromoCode("EKWA_WELCOME"),
            $this->checkDiscountCodeResponse
        );
        
        foreach($this->checkDiscountCodeResponse->notification()->getErrors() as $error) {
            $this->assertSame("The promocode 'EKWA_WELCOME' is expired", $error->message());
        }
        $this->assertTrue($this->checkDiscountCodeResponse->notification()->hasError());
        
    }
    
    public function test_it_returns_promocode_have_got_offer() {
        $this->checkDiscountCode->execute(
            $this->checkDiscountCodeRequest->withPromoCode("ALL_2000"),
            $this->checkDiscountCodeResponse
        );
        
        $this->assertFalse($this->checkDiscountCodeResponse->notification()->hasError());
        $this->assertSame("ALL_2000", $this->checkDiscountCodeResponse->promoCode);
        
    }
    
    public function test_it_returns_promocode_doesnt_have_offer() {
        $this->checkDiscountCode->execute(
            $this->checkDiscountCodeRequest->withPromoCode("WOODY_WOODPECKER"),
            $this->checkDiscountCodeResponse
        );
        
        foreach($this->checkDiscountCodeResponse->notification()->getErrors() as $error) {
            $this->assertSame("No Offer is available for promocode 'WOODY_WOODPECKER'", $error->message());
        }
        $this->assertTrue($this->checkDiscountCodeResponse->notification()->hasError());
        
    }
    
}