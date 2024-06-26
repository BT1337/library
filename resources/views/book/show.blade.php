@extends('layouts.main')
@section('content')
    <div>
        <div class="mb-3">{{ $book->id }}. {{ $book->title }}</div>

        @foreach($book->authors as $author)
            <div class="mb-3">{{ $author->full_name }}</div>
        @endforeach

        <div>{{ $book->description }}</div>
    </div>
@endsection
