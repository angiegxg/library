<?php

use App\Http\Controllers\AuthorController;
use Inertia\Inertia;
use App\Models\Books;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\bookController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SesionController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', function () {
    
    return view('home' );
})->middleware('auth')->name('home');

Route::get('/showbooks', [bookController::class, 'showAllbook'])->middleware('auth')->name('showAllBook');
Route::get('/showAddBookForm', [bookController::class, 'showAddBookForm'])->name('addBookForm');
Route::get('/showUpdateBookForm/{id}', [bookController::class, 'showUpdateBookForm'])->name('showUpdateBookForm');
Route::post('/addbook', [bookController::class, 'addBook'])->name('addbookPost');
Route::post('/updateBookPost/{id}', [bookController::class, 'updateBook'])->name('updateBookPost');
Route::get('/checkoutBook/{id}', [CheckoutController::class, 'checkoutBook'])->name('checkoutBook');
Route::get('/showBorrowedbooks', [CheckoutController::class, 'showBorrowedbooks'])->name('showBorrowedbooks');
Route::get('/checkoutUpdateStatus/{id}', [CheckoutController::class, 'checkoutUpdateStatus'])->name('checkoutUpdateStatus');
Route::get('/showAddAuthorForm', [AuthorController::class, 'showAddAuthorForm'])->name('showAddAuthorForm');
Route::post('/addAuthor', [AuthorController::class, 'addAuthor'])->name('addAuthorPost');
Route::get('/showAddGenreForm', [GenreController::class, 'showAddGenreForm'])->name('showAddGenreForm');
Route::post('/addGenre', [GenreController::class, 'addGenre'])->name('addGenrePost');
Route::get('/logout', [SesionController::class, 'logout'])->name('logout');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
