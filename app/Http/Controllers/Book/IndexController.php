<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Resources\Json\ResourceCollection;


class IndexController extends Controller
{
    public function index() : ResourceCollection
    {
        $books = Book::with('author')->paginate(9);
        return BookResource::collection($books);
    }
}
