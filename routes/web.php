<?php
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\userController;
use App\Http\Controllers\mapController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('map');
})->middleware(['auth', 'verified'])->name('dashboard.index');

Route::middleware('auth','admin')->group(function () {
    Route::get('admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('fasilitas', [fasilitasController::class, 'getFacilities'])->name('admin.fasilitas');
    Route::resource('users',userController::class);
    Route::resource('review',reviewController::class);
    Route::resource('fasility',fasilitasController::class);
    
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','user')->group(function () {
    Route::get('map', [mapController::class, 'index'])->name('map.index');
    Route::get('fasilitas', [mapController::class, 'getFacilities'])->name('user.fasilitas');
    
    
});
require __DIR__.'/auth.php';
