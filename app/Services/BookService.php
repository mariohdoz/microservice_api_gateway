<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService 
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
        $this->baseUri = config('services.books.base_uri');
        $this->secret = config('services.books.secret');
    }


     /** 
     * Get the full list of books from the book service
     * @return string 
     */
    public function obtainBooks(){
        return $this->performRequest('GET', '/books');
    }

    /** 
     * Get the full list of books from the book service
     * @return string 
     * @param int $book
     */
    public function obtainBook($book){
        return $this->performRequest('GET', "/books/{$book}");
    }

    /** 
     * Get the full list of books from the book service
     * @return string 
     */
    public function createBook($data){
        return $this->performRequest('POST', '/books', $data);
    }

    /** 
     * Get the full list of books from the book service
     * @return string 
     */
    public function updateBook($data, $book){
        return $this->performRequest('PUT', "/books/{$book}", $data);
    }

    /** 
     * Get the full list of books from the book service
     * @return string 
     */
    public function deleteBook($book){
        return $this->performRequest('DELETE', "/books/{$book}");
    }

}
