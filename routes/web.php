<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/event-detail', function() {
    return view('pages.event-detail');
});
Route::get('/about', function() {
    return view('pages.about');
})->name('about');

Auth::routes(['reset' => false, 'confirm' => false, 'verify' => false]);

Auth::routes();

