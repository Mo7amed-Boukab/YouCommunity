<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/EventComm',[HomeController::class,'home']);
                                                                       
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [EventController::class, 'index'])->name('admin.index');
    Route::post('/admin/create', [EventController::class, 'create'])->name('admin.create');
    Route::get('/events', [EventController::class, 'myEvents'])->name('admin.events');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
});

Route::post('/events/{event}/reserve', [ReservationController::class, 'store'])->name('reservations.store');
Route::delete('/events/{event}/cancel', [ReservationController::class, 'destroy'])->name('reservations.destroy');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
