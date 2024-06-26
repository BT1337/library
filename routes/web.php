<?php


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/create', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
Route::patch('/books/{book}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.delete');

Route::get('/books/authors/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/books/authors/create', [AuthorController::class, 'store'])->name('author.store');



