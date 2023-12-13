<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PageTitleController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::prefix('blogs')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
    Route::get('/add', [App\Http\Controllers\ArticleController::class, 'showAddBlog'])->name('blog.show-add');
    Route::post('/add', [App\Http\Controllers\ArticleController::class, 'add'])->name('blog.add');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.details');
});

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/events', [App\Http\Controllers\ProfileController::class, 'event'])->name('profile.events'); //harusnya di event
});

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logoutRouteDisable']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout')->middleware('auth');

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
