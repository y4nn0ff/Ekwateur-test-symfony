<?php declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCode;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodeRequest;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodeResponse;
use App\Domain\Offer\UseCase\CheckDiscountCode\CheckDiscountCodePresenter;

/**
* Script check promo code given on argument
*/
class PromoCodeValidateCommand extends Command
{
    protected static $defaultName = 'promo-code:validate';
    /**
     * @var CheckDiscountCode $checkdiscountCode 
     */
    private $checkdiscountCode;
    
    /**
     * @var CheckDiscountCodeRequest $checkdiscountCodeRequest 
     */
    private    $checkdiscountCodeRequest;
    
    /**
     * @var CheckDiscountCodeResponse $checkdiscountCodeResponse 
     */
    private    $checkdiscountCodeResponse;
    
    /**
     * @var CheckDiscountCodePresenter $checkdiscountCodePresenter 
     */
    private    $checkdiscountCodePresenter;
    public function __construct(
        CheckDiscountCode $checkdiscountCode,
        CheckDiscountCodeRequest $checkdiscountCodeRequest,
        CheckDiscountCodeResponse $checkdiscountCodeResponse,
        CheckDiscountCodePresenter $checkdiscountCodePresenter) {
        
            parent::__construct();
            $this->checkdiscountCode = $checkdiscountCode;
            $this->checkdiscountCodeRequest = $checkdiscountCodeRequest;
            $this->checkdiscountCodeResponse = $checkdiscountCodeResponse;
            $this->checkdiscountCodePresenter = $checkdiscountCodePresenter;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('promo_code', InputArgument::REQUIRED, 'The code to check')
    ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->checkdiscountCode->execute(
            $this->checkdiscountCodeRequest->withPromoCode($input->getArgument('promo_code')),
            $this->checkdiscountCodeResponse
        );
        
        $output->writeln($this->checkdiscountCodePresenter->present($this->checkdiscountCodeResponse));

        return Command::SUCCESS;
    }
}