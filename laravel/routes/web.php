<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\AdminController;

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'check.permission:access_admin_panel']);

Route::prefix('admin')
    ->middleware([
        'auth',
        'check.permission:access_admin_panel'
    ])
    ->group(function () {

        Route::get('/', [AdminController::class, 'index'])
            ->name('admin.index');

        Route::resource('categories', CategoryController::class);
    });

require __DIR__.'/auth.php';
