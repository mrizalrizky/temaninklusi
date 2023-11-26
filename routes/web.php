<?php

use App\Mail\Email;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', [\App\Http\Controllers\EventController::class, 'showPopularEvents'])->name('index');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::prefix('blogs')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.details');
});

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::post('/comments', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
    Route::post('/comments/reply', [App\Http\Controllers\CommentController::class, 'replyComment'])->name('comment.reply');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details');
    Route::post('/{slug}/{actionType}', [App\Http\Controllers\EventController::class, 'eventAction'])->name('event.action');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/')->name('profile.index');
    Route::get('/events')->name('profile.events');
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset-password');


Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'generateMail'])->name('generate.reset-password');

Route::get('/validate-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'index'])->name('validate.password');
Route::post('/validate-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword'])->name('update.password');

Route::get('/test', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword']);

Route::get('/x', function () {
    return view('pages.validate-password');
});
