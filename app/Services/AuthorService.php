<?php

namespace App\Services;

use App\Traits\ConsumesExteralService;

class AuthorService 
{
    use ConsumesExteralService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }


}
