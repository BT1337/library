@extends('layouts.main')
@section('content')
    <div>
        <div>
            @foreach($books as $book)
                @php
                    $index = ($books->currentPage() - 1) * $books->perPage() + $loop->iteration;
                @endphp
                <div>
                    <a href="{{ route('book.show', $book->id) }}"
                       class="text-decoration-none text-dark">
                        {{ $index }}. {{ $book->title }}
                    </a>
                </div>
            @endforeach
            <div>
                {{ $books->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
