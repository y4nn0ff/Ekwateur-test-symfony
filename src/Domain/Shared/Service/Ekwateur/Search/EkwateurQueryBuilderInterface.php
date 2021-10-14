<?php declare(strict_types=1);

namespace App\Domain\Shared\Service\Ekwateur\Search;

interface EkwateurQueryBuilderInterface {
    public function addFilter(string $attribute, string $operator, $value);
    
    public function getFilters();
} 