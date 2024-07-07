<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->paginate(3);


        return view('book.index', compact('books'));
    }
}
