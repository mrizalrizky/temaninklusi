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

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);

Route::prefix('blogs')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.details');
});

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/')->name('profile.index');
    Route::get('/events')->name('profile.events');
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);

