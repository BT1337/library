<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Book $book)
    {
        $book->authors()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }
}
