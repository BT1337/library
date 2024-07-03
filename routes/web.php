<?php


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Book'], function() {
    Route::get('/books', 'IndexController')->name('book.index');
    Route::get('/books/create', 'CreateController')->name('book.create');
    Route::post('/books/create', 'StoreController')->name('book.store');
    Route::get('/books/{book}', 'ShowController')->name('book.show');
    Route::get('/books/{book}/edit', 'EditController')->name('book.edit');
    Route::patch('/books/{book}', 'UpdateController')->name('book.update');
    Route::delete('/books/{book}', 'DestroyController')->name('book.delete');
});



Route::get('/books/authors/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/books/authors/create', [AuthorController::class, 'store'])->name('author.store');



