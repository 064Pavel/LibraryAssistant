<?php

namespace App\Http\Controllers\Book\Filter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use App\Models\BookUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserBooksController extends Controller
{
    public function get_books($user_id)
    {

        $books = User::find($user_id)->books()->get();
        return BookResource::collection($books);
    }
}
