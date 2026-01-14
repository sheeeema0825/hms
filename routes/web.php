<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('guest/login',[LoginController::class, 'showGuestLoginForm'])->name('guest.login');
Route::post('guest/login',[LoginController::class, 'guestLogin'])->name('guest.login'); 

Route::middleware('auth:guest')->group(function () {
    Route::get('/guest/dashboard', [LoginController::class, 'guestDashboard'])
        ->name('guest.dashboard');

    Route::get('/guest/logout', [LoginController::class, 'guestLogout'])
        ->name('guest.logout');
});

Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])
    ->middleware('auth:web')
    ->name('admin.dashboard');

    Route::get('/admin/staff', [StaffController::class, 'staff'])->name('admin.staff');
    Route::post('/admin/staff', [StaffController::class, 'storeStaff'])->name('admin.staff.store');
  

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('guest/dashboard',[LoginController::class, 'guest'])->name('guest.dashboard');






Route::get('/register', [LoginController::class, 'showGuestRegistrationForm'])->name('guest.register');
Route::post('/register', [LoginController::class, 'register'])->name('guest.register');

Route::get('/admin/bookings', [BookingController::class, 'bookings'])->name('admin.bookings');
Route::get('/admin/staff', [StaffController::class, 'staff'])->name('admin.staff');
Route::get('/admin/guests', [GuestController::class, 'guest'])->name('admin.guests');
Route::get('/admin/rooms', [RoomController::class, 'rooms'])->name('admin.rooms');
Route::get('/admin/payments', [PaymentController::class, 'payments'])->name('admin.payments');

Route::post('/admin/guests', [GuestController::class, 'storeGuests'])->name('admin.guests');
Route::get('/admin/guests',[GuestController::class, 'listGuests'])->name('admin.guests.list');
