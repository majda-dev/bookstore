<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Book_serieController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/books/{encryptedId}/show', [IndexController::class, 'show'])->name('booksshow.show');

Route::get('/books/add', [BookController::class, 'create'])->name('books.add');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');
Route::get('/books/list', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{encryptedId}', [BookController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}/update', [BookController::class, 'update'])->name('books.update');
Route::delete('books/{id}/delete', [BookController::class, 'destroy'])->middleware('admin')->name('books.destroy');






Route::get('/writers/add', [WriterController::class, 'create'])->middleware('admin')->name('writers.add');
Route::post('/writers/store', [WriterController::class, 'store'])->middleware('admin')->name('writers.store');
Route::get('/writers/list', [WriterController::class, 'index'])->middleware('admin')->name('writers.list');
Route::get('/writers/{id}/books', [WriterController::class, 'showBook'])->name('writers.show_books');
Route::get('/writers/{id}/edit', [WriterController::class, 'edit'])->name('writers.edit');
Route::put('/writers/{id}/update', [WriterController::class, 'update'])->name('writers.update');
Route::delete('writers/{id}/delete', [WriterController::class, 'destroy'])->middleware('admin')->name('writers.destroy');

Route::get('/categories/add', [CategoryController::class, 'create'])->middleware('admin')->name('categories.add');
Route::post('/categories/store', [CategoryController::class, 'store'])->middleware('admin')->name('categories.store');
Route::get('/categories/list', [CategoryController::class, 'index'])->middleware('admin')->name('categories.list');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}/delete', [CategoryController::class, 'destroy'])->middleware('admin')->name('categories.destroy');


Route::get('/publishers/add', [PublisherController::class, 'create'])->middleware('admin')->name('publishers.add');
Route::post('/publishers', [PublisherController::class, 'store'])->middleware('admin')->name('publishers.store');

Route::get('/admins/add', [AdminController::class, 'create'])->middleware('admin')->name('admins.add');
Route::post('/admins/store', [AdminController::class, 'store'])->middleware('admin')->name('admins.store');
Route::get('/admins/list', [AdminController::class, 'index'])->middleware('admin')->name('admins.list');
Route::get('/admins/{id}', [AdminController::class, 'show'])->name('admins.show');
Route::get('/admins/{id}/edit', [AdminController::class, 'edit'])->name('admins.edit');
Route::get('/admins/{id}/editPassword', [AdminController::class, 'editPassword'])->name('admins.editPassword');
Route::put('/admins/{id}/updatepassword', [AdminController::class, 'updatePassword'])->name('admins.updatePassword');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authentificate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/clients/add', [ClientController::class, 'create'])->name('clients.add');
Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');

Route::get('/book_series/list', [Book_serieController::class, 'index'])->name('book_series.list');
Route::get('/book_series/add', [Book_serieController::class, 'create'])->name('book_series.add');
Route::post('/book_series/store', [Book_serieController::class, 'store'])->name('book_series.store');
Route::get('/book_series/{id}/edit', [Book_serieController::class, 'edit'])->name('book_series.edit');
Route::put('/book_series/{id}/update', [Book_serieController::class, 'update'])->name('book_series.update');

// Route::get('/cookie/get', function(Request $request){
//     dd($request->cookie('name'));
// });

// Route::get('/cookie/set/{cookie}', function($cookie)
// {
//     $cookieObject=cookie()->forever('name',$cookie,);
//     return response('')->withCookie($cookieObject);
// });

Route::group(['middleware' => 'mySession'], function () {
    // Your routes or controllers that should use the middleware
    // ...

    // Example route:
});

Route::get('/add-to-cart/{bookId}', [CartController::class, 'addToCart'])->name('addToCart');

Route::get('/cart', [CartController::class, 'getCartGuest']);
Route::post('/purchase-cart', [CartController::class, 'purchaseCartGuest']);
Route::get('/cart', [CartController::class, 'showCart'])->name('cart');
