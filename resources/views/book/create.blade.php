@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('book.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название книги</label>
                <input value="{{ old('title') }}" type="text" class="form-control" id="title" name="title" placeholder="Название книги">
                @error('title')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Год выпуска</label>
                <input value="{{ old('year') }}" type="number" class="form-control" id="year" name="year" placeholder="Год">
                @error('year')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Описание">{{ old('description') }}</textarea>
                @error('description')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input value="{{ old('isbn') }}" type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
                @error('isbn')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input value="{{ old('image') }}" type="text" class="form-control" id="image" name="image" placeholder="Изображение">
                @error('image')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <label for="authors">Автор </label>
            <select class="form-select mb-3" id="authors" name="authors[]">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->full_name }}</option>
                @endforeach
            </select>

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn btn-primary">Добавить</button>
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
    </div>
@endsection
