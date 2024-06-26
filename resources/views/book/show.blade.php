@extends('layouts.main')
@section('content')
    <div>
        <div class="mb-3">{{ $book->title }}</div>

        @foreach($book->authors as $author)
            <div class="mb-3">{{ $author->full_name }}</div>
        @endforeach

        <div class="mb-3">{{ $book->description }}</div>

        <div><a href="{{ route('book.edit', $book->id) }}">Изменить</a></div>

        <div class="d-flex justify-content-end mb-3">
            <form action="{{ route('book.delete', $book->id) }}" method="post">
            @csrf
            @method('delete')
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>

        <div><a href="{{ route('book.index') }}">Назад</a></div>
    </div>
@endsection
