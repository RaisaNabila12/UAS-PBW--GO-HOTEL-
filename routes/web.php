<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');

    Route::post('/booking/store/{room}', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
    Route::post('/booking/cancel/{id}', [BookingController::class, 'cancel'])->name('booking.cancel');

    // Fitur Management Profile Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute CRUD Kamar Khusus Admin
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('rooms', RoomController::class);
    });
});

require __DIR__.'/auth.php';