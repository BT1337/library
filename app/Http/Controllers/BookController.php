<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    public function store()
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

    public function show(Book $book)
    {
        $authors = Author::all();
        return view('book.show', compact('book', 'authors'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }

    public function update(Book $book)
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

    public function destroy(Book $book)
    {
        $book->authors()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }
}
