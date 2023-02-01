<?php

namespace App\Http\Controllers\Book\Filter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Filter\GetAuthorResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BooksByAuthorController extends Controller
{
    public function get_authors() : ResourceCollection
    {
        $author = Book::with('author')->get();
        return GetAuthorResource::collection($author);
    }

    public function get_books($author_id)
    {
        $books = Book::with('author')->where('author_id', $author_id)->distinct()->get();
        return BookResource::collection($books);
    }
}
