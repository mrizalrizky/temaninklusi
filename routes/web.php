<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageTitleController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

<<<<<<< HEAD
Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);
=======
Route::prefix('blogs')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'getAllArticles'])->name('blog.index');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'getArticleDetails'])->name('blog.details');
});

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'eventDetails'])->name('event.details');
});

Route::prefix('profile')->group(function () {
    Route::get('/')->name('profile.index');
    Route::get('/events')->name('profile.events');
});
>>>>>>> 647642f40fa4ea5dd869556606044165048dede3

Auth::routes();

