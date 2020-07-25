<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService 
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
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
