<?php declare(strict_types=1);

namespace App\Tests\Service;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpResponse implements ResponseInterface {
    
    /**
    * @var Array<mixed> $content
    **/
    public $content;
    public function getStatusCode(): int {
        return 0;
    }
    
    public function getHeaders(bool $throw = true) : array {
        return [];
    }
    
    public function getContent(bool $throw = true) : string {
        return json_encode($this->content)?:'';
    }
    
    /**
    * @return array<mixed>
    **/
    public function toArray(bool $throw = true) : array {
        return [];
    }
    
    public function cancel() : void{
        
    }
    
    public function getInfo(?string $type = NULL) {
        
    }
    
    /**
    * @param array<mixed> $content
    **/
    public function setContent(array $content) : void{
        $this->content = $content;
    }
}