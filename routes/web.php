<?php

use App\Mail\Email;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [\App\Http\Controllers\EventController::class, 'showNewestEvents'])->name('index');

Route::get('/link-storage', function (){
    Artisan::call('storage:link');
});

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::prefix('blogs')->group(function () {
    Route::get('/', [App\Http\Controllers\ArticleController::class, 'index'])->name('blog.index');
    Route::get('/upload', [App\Http\Controllers\ArticleController::class, 'showAddBlog'])->name('blog.show-add');
    Route::post('/upload/validate', [App\Http\Controllers\ArticleController::class, 'validateData'])->name('blog.validate');
    Route::post('/upload', [App\Http\Controllers\ArticleController::class, 'create'])->name('blog.create');
    Route::get('/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('blog.details')->middleware('check.article.access');
    Route::delete('/{slug}', [App\Http\Controllers\EventController::class, 'delete'])->name('blog.delete');
    Route::get('/{slug}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('blog.edit');
    Route::put('/{slug}/edit', [App\Http\Controllers\ArticleController::class, 'update'])->name('blog.update');

});

Route::prefix('events')->group(function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('event.index');

    Route::group(['middleware' => 'auth'],function () {
        Route::group(['middleware' => 'can:upload-event'], function () {
            Route::get('/upload', [App\Http\Controllers\EventController::class, 'showUploadEventPage'])->name('event.upload');
            Route::post('/upload', [App\Http\Controllers\EventController::class, 'create'])->name('event.create');
            Route::post('/upload/validate', [App\Http\Controllers\EventController::class, 'validateData'])->name('event.validate');
        });

        Route::group(['middleware' => 'can:is-admin'], function () {
            Route::post('/edit/validate', [App\Http\Controllers\EventController::class, 'validateData'])->name('event.edit.validate');
            Route::get('/{slug}/edit', [App\Http\Controllers\EventController::class, 'edit'])->name('event.edit');
            Route::put('/{slug}/edit', [App\Http\Controllers\EventController::class, 'update'])->name('event.update');
            Route::delete('/{slug}', [App\Http\Controllers\EventController::class, 'delete'])->name('event.delete');

            Route::delete('/comments/{id}', [App\Http\Controllers\CommentController::class, 'deleteComment'])->name('comment.delete');
            Route::delete('/comments/reply/{id}', [App\Http\Controllers\CommentController::class, 'deleteCommentReply'])->name('comment.reply.delete');
        });

        Route::post('/comments', [App\Http\Controllers\CommentController::class, 'create'])->name('comment.create');
        Route::post('/comments/reply', [App\Http\Controllers\CommentController::class, 'replyComment'])->name('comment.reply');

    });
    Route::get('/{slug}', [App\Http\Controllers\EventController::class, 'show'])->name('event.details')->middleware('check.event.access');
    Route::post('/{slug}/{actionType}', [App\Http\Controllers\EventController::class, 'eventAction'])->name('event.action');
});

Route::group(['prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('profile.index');
    Route::get('/events', [App\Http\Controllers\EventController::class, 'showEventsByRole'])->name('profile.events'); //harusnya di event
    Route::post('/', [App\Http\Controllers\UserController::class, 'update'])->name('profile.update');
    Route::post('/validate', [App\Http\Controllers\UserController::class, 'validateData'])->name('profile.validate');
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

Route::group(['prefix' => 'admin', 'middleware' => 'can:is-admin'], function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('manage-user')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'showManageUser'])->name('admin.manage-user');
        Route::put('/ban/{id}', [\App\Http\Controllers\UserController::class, 'ban'])->name('admin.ban');
        Route::put('/unban/{id}', [\App\Http\Controllers\UserController::class, 'unban'])->name('admin.unban');
    });

    Route::prefix('manage-event')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'showManageEvent'])->name('admin.manage-event');
    });
});
