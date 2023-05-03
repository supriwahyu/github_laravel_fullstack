<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/signin', [HomeController::class, 'signin'])->name('signin');
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => 'auth:admin,user'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('logout2', [AuthController::class, 'logoutUser'])->name('logoutUser');
    // article route
    Route::get('article', [ArticleController::class, 'index'])->name('article');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('admin.article.create');
    Route::post('/article/store', [ArticleController::class, 'store'])->name('admin.article.store');
    Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('admin.article.edit');
    Route::put('/article/update/{id}', [ArticleController::class, 'update'])->name('admin.article.update');
    Route::get('/article/show/{id}', [ArticleController::class, 'show'])->name('admin.article.show');
    Route::delete('/article/delete/{id}', [ArticleController::class, 'destroy'])->name('admin.article.delete');
    // book route
    Route::get('book', [BookController::class, 'index'])->name('book');
    Route::get('/book/create', [BookController::class, 'create'])->name('admin.book.create');
    Route::post('/book/store', [BookController::class, 'store'])->name('admin.book.store');
    Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('admin.book.edit');
    Route::put('/book/update/{id}', [BookController::class, 'update'])->name('admin.book.update');
    Route::get('/book/show/{id}', [BookController::class, 'show'])->name('admin.book.show');
    Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('admin.book.delete');
    //review route
    Route::get('book/review/{id}', [ReviewController::class, 'index'])->name('review');
    Route::post('/book/review', [ReviewController::class, 'store'])->name('admin.review.store');
});