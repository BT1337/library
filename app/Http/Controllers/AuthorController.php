<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function create()
    {
        return view('author.create');
    }

    public function store()
    {
        $data = request()->validate([
            'full_name' => 'string'
        ]);

        Author::create($data);
        return redirect()->route('book.create');
    }
}
