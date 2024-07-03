@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('book.update', $book->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Название книги</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" placeholder="Название книги">
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Год выпуска</label>
                <input type="number" class="form-control" id="year" name="year" value="{{ $book->year }}" placeholder="Год">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Описание">{{ $book->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}" placeholder="ISBN">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $book->image }}" placeholder="Изображение">
            </div>
            <label for="authors">Автор </label>
            <select class="form-select mb-3" id="authors" name="authors[]">
                @foreach ($authors as $author)
                    <option
                        @foreach($book->authors as $bookAuthor)
                            {{ $author->id === $bookAuthor->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $author->id }}">{{ $author->full_name }}</option>
                @endforeach
            </select>
            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Обновить</button>
                <button type="button" class="btn-dark btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить автора</button>
            </div>
        </form>
        <form action="{{ route('author.store') }}" method="post">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить автора</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Автор">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="mt-4">
            <a href="{{ route('book.show', $book->id) }}"><button type="button" class="btn btn-primary btn-sm">Назад</button></a>
        </div>
    </div>
@endsection
