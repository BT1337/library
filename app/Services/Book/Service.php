<?php

namespace App\Services\Book;

use App\Models\Book;

class Service
{
    public function store($data)
    {
        $authors = $data['authors'];
        unset($data['authors']);

        $book = Book::create($data);
        $book->authors()->attach($authors);
    }

    public function update($book, $data)
    {
        $authors = $data['authors'];
        unset($data['authors']);

        $book->update($data);
        $book->authors()->sync($authors);
    }
}
