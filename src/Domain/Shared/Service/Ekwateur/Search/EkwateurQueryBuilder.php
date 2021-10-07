<?php 

namespace App\Domain\Shared\Service\Ekwateur\Search;

class EkwateurQueryBuilder implements EkwateurQueryBuilderInterface {
    
    private $filters = [];
    public function addFilter(string $attribute, string $operator, $value) {
        $this->filters[] = $attribute . $operator . $value;
    }
    
    public function getFilters() {
        return $this->filters;
    }
    
} 