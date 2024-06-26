@extends('layouts.main')
@section('content')
    <div>
        <div>
            @foreach($books as $book)
                <div>
                    <a href="{{ route('book.show', $book->id) }}"
                       class="text-decoration-none text-dark">
                        {{ $loop->iteration }}. {{ $book->title }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
