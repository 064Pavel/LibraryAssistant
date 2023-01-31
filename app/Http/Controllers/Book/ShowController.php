<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($id){

        return new BookResource(Book::findOrFail($id));
    }
}
