<?php

declare(strict_types=1);

namespace App\Presentation\Offer;

use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodePresenter as CheckDiscountCodePresenterInterface;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodeResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use App\Domain\Shared\Logger\Logger;

class CheckDiscountCodePresenter implements CheckDiscountCodePresenterInterface
{
    /**
     * @var KernelInterface $kernel 
     **/
    private $kernel;
    /**
     * @var Logger $logger 
     **/
    private $logger;
    public function __construct(KernelInterface $kernel, Logger $logger)
    {
        $this->kernel = $kernel;
        $this->logger = $logger;
    }

    public function present(CheckDiscountCodeResponse $response): string
    {
        if ($response->notification()->hasError()) {
            $errors = [];
            foreach ($response->notification()->getErrors() as $error) {
                $this->logger->error($error->getError(), ['class' => __CLASS__, 'method' => __METHOD__]);
                $errors[] = $error;
            }
            return implode("\n", $errors);
        }
        $fileName = $this->writeJsonFile($response);
        if ($fileName == null) {
            return sprintf("An issue has rised during file genraton (see log)");
        } else {
            return sprintf("SUCCESS : See the file %s to get the result", $fileName);
        }
    }


    /**
     * @return array<mixed>
     **/
    public function buildJsonFile(CheckDiscountCodeResponse $response): array
    {
        $json = [
            'promoCode' => $response->promoCode,
            'endDate' => $response->endDate->format('Y-m-d'),
            'discountValue' => $response->discountValue,
            'compatibleOfferList' => [],
        ];
        foreach ($response->offers as $offer) {
            $json['compatibleOfferList'][] = [
                'name' => $offer->getOfferName(),
                'type' => $offer->getOfferType(),
            ];
        }
        return $json;
    }

    public function writeJsonFile(CheckDiscountCodeResponse $response): ?string
    {
        try {
            $dir = $this->kernel->getProjectDir() . '/promocodes';
            if (!is_dir($dir)) {
                mkdir($dir);
            }
            $json = $this->buildJsonFile($response);
            $fileName = $dir . '/' . $response->promoCode . ".json";
            file_put_contents($fileName, json_encode($json));
            return $fileName;
        } catch (\Exception | \Error $e) {
            $this->logger->error($e->getMessage() . ' ' . $e->getFile() . ' ' . $e->getLine(), ['class' => __CLASS__, 'method' => __METHOD__]);
            return null;
        }
    }
}
