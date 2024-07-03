<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Book $book)
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

        $book->update($data);
        $book->authors()->sync($authors);
        return redirect()->route('book.show', $book->id);
    }
}
