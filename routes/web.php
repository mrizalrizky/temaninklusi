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

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'eventDetails'])->name('event.details');
});

Route::prefix('profile')->group(function () {
    Route::get('/')->name('profile.index');
    Route::get('/events')->name('profile.events');
});

Auth::routes();

