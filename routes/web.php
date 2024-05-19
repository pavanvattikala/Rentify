<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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

Route::get('/', [PropertyController::class, 'list'])->name('properties.list');


Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// properies routes


Route::middleware('auth')->name('properties.')->prefix('properties')->group(function () {
    Route::get('create', [PropertyController::class, 'create'])->name('create');
    Route::post('insert', [PropertyController::class, 'insert'])->name('insert');
    Route::get('show/{id}', [PropertyController::class, 'show'])->name('show');
    Route::post('/insert', [PropertyController::class, 'insert'])->name('insert');
    Route::post('/like', [PropertyController::class, 'like'])->name('like');
    Route::get('edit/{property}', [PropertyController::class, 'edit'])->name('edit');
    Route::post('update/{property}', [PropertyController::class, 'update'])->name('update');
    Route::delete('delete/{property}', [PropertyController::class, 'destroy'])->name('destroy');
});



require __DIR__ . '/auth.php';
