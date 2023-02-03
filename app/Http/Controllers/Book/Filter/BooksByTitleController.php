<?php

namespace App\Http\Controllers\Book\Filter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BooksByTitleController extends Controller
{
    public function get_books($title) : ResourceCollection{
        $books = Book::with('author')->where('title', $title)->distinct()->get();
        return BookResource::collection($books);
    }

}
