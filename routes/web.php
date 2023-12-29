<?php

use App\Mail\Email;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::prefix('blog')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
    Route::get('/add', [App\Http\Controllers\ArticleController::class, 'showAddBlog'])->name('blog.show-add');
    Route::post('/add', [App\Http\Controllers\ArticleController::class, 'create'])->name('blog.create');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.details');

    Route::post('/{slug}/edit', [App\Http\Controllers\ArticleController::class, 'update'])->name('blog.update');
    Route::get('/{slug}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('blog.edit');
});

Route::prefix('events')->group(function () {
    Route::post('/comments/reply', [App\Http\Controllers\CommentController::class, 'replyComment'])->name('comment.reply');
    Route::post('/comments', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/upload', [App\Http\Controllers\EventController::class, 'showUploadEventPage'])->name('event.upload');
    Route::post('/upload', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details');
    Route::get('/{slug}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
    Route::post('/{slug}/edit', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::post('/{slug}/{actionType}', [App\Http\Controllers\EventController::class, 'eventAction'])->name('event.action');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/events', [App\Http\Controllers\EventController::class, 'showEventsByRole'])->name('profile.events'); //harusnya di event
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logoutRouteDisable']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');


Route::post('/forgot-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'generateMail'])->name('generate.forgot-password');

Route::get('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'index'])->name('reset.password');
Route::post('/reset-password', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword'])->name('update.password');

Route::get('/test', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'resetPassword']);

Route::get('/x', function () {
    return view('pages.reset-password');
});
