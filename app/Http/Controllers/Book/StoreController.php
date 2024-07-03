<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate([
            'title' => 'string',
            'year' => 'integer',
            'description' => 'string',
            'isbn' => 'string',
            'image' => 'string',
            'authors' => ''
        ]);
        $authors = $data['authors'];
        unset($data['authors']);

        $book = Book::create($data);
        $book->authors()->attach($authors);
        return redirect()->route('book.index');
    }
}
