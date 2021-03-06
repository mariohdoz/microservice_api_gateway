<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorService 
{
    use ConsumesExternalService;

    /**
     * The base uri to be used to consume the authors service
     */
    public $baseUri;

    /**
     * The secret to be used to consume the authors service
     */
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
        $this->secret = config('services.authors.secret');
    }

    /** 
     * Get the full list of authors from the author service
     * @return string 
     */
    public function obtainAuthors(){
        return $this->performRequest('GET', '/authors');
    }

    /** 
     * Get the full list of authors from the author service
     * @return string 
     */
    public function obtainAuthor($author){
        return $this->performRequest('GET', "/authors/{$author}");
    }

    /** 
     * Get the full list of authors from the author service
     * @return string 
     */
    public function createAuthor($data){
        return $this->performRequest('POST', '/authors', $data);
    }

    /** 
     * Get the full list of authors from the author service
     * @return string 
     */
    public function updateAuthor($data, $author){
        return $this->performRequest('PUT', "/authors/{$author}", $data);
    }

    /** 
     * Get the full list of authors from the author service
     * @return string 
     */
    public function deleteAuthor($author){
        return $this->performRequest('DELETE', "/authors/{$author}");
    }
    


}
