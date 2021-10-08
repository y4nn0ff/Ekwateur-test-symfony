<?php 

namespace App\Tests\Service;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpResponse implements ResponseInterface {
    
    public function getStatusCode(): int {
        
    }
    
    public function getHeaders(bool $throw = true) : array {
        
    }
    
    public function getContent(bool $throw = true) : string {
        return json_encode($this->content);
    }
    
    public function toArray(bool $throw = true) : array {
        
    }
    
    public function cancel() : void{
        
    }
    
    public function getInfo(?string $type = NULL) {
        
    }
    
    public function setContent($content) {
        $this->content = $content;
    }
}