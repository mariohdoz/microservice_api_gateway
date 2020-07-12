<?php

namespace App\Services;

use App\Traits\ConsumesExteralService;

class BookService 
{
    use ConsumesExteralService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

}
