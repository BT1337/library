@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('author.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Автор</label>
                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Автор">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection
