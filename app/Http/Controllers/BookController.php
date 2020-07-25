<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\BookService;
use App\Services\AuthorService;

class BookController extends Controller
{
    use ApiResponser;

    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function store(Request $request)
    {

        $this->authorService->obtainAuthor($request->author_id);

        return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
        
    }

    public function show($author)
    {
        return $this->successResponse($this->bookService->obtainBook($author));
    }

    public function update(Request $request, $author)
    {
        return $this->successResponse($this->bookService->updateBook($request->all(), $author));
    }
    
    public function destroy($author)
    {
        return $this->successResponse($this->bookService->deleteBook($author));
    }

}
