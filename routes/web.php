<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UrlsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// You need to be logged in to access these routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // The routes for the url overview and add or edit page
    Route::prefix('urls')->group(function () {
        Route::get('/', function () {
            return redirect('/urls/overview');
        });

        Route::get('overview', [UrlsController::class, 'index'])->name('urls.overview');
        Route::get('create', [UrlsController::class, 'create'])->name('urls.create');
        Route::post('store', [UrlsController::class, 'store'])->name('urls.store');
        Route::get('edit/{url}', [UrlsController::class, 'edit'])->name('urls.edit');
        Route::post('update/{url}', [UrlsController::class, 'update'])->name('urls.update');
        Route::delete('delete/{url}', [UrlsController::class, 'destroy'])->name('urls.delete');
    });
});

// The redirect route for the short urls
Route::get('s/{url:hash}', [UrlsController::class, 'redirect'])->name('redirect.link');

require __DIR__.'/auth.php';
