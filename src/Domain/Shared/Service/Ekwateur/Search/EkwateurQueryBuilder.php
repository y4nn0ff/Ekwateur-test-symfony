<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Search;

class EkwateurQueryBuilder implements EkwateurQueryBuilderInterface {
    
    /**
    * @var array<string>
    **/
    private $filters = [];
    public function addFilter(string $attribute, string $operator, string $value) :void {
        $this->filters[] = $attribute . $operator . $value;
    }
    
    /**
    * @return array<string>
    **/
    public function getFilters() : array{
        return $this->filters;
    }
    
} 