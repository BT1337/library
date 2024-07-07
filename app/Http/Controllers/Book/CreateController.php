<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }
}
