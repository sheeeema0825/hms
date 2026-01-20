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
| AUTH – LOGIN / REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [LoginController::class, 'showGuestRegistrationForm'])->name('guest.register');
Route::post('/register', [LoginController::class, 'register'])->name('guest.register.store');

/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/

Route::get('/guest/login', [LoginController::class, 'showLoginForm'])->name('guest.login');
Route::post('/guest/login', [LoginController::class, 'guestLogin'])->name('guest.login.post');

Route::middleware('auth:guest')->group(function () {
    Route::get('/guest/dashboard', [LoginController::class, 'guestDashboard'])->name('guest.dashboard');
    Route::post('/guest/logout', [LoginController::class, 'guestLogout'])->name('guest.logout');
});
Route::get('/guest/profile', [GuestController::class, 'profile'])->name('guest.profile');
Route::post('/guest/profile/update', [GuestController::class, 'updateProfile'])->name('guest.profile.update');
Route::get('/guest/book-room', [GuestController::class, 'guestRooms'])->name('guest.book.room');

/*
|--------------------------------------------------------------------------
| STAFF
|--------------------------------------------------------------------------
*/


Route::get('/staff/login', [LoginController::class, 'showLoginForm'])->name('staff.login');
Route::post('/staff/login', [LoginController::class, 'staffLogin'])->name('staff.login.post');
Route::middleware('auth:staff')->group(function () {
    Route::get('/staff/dashboard', [LoginController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::post('/staff/logout', [LoginController::class, 'staffLogout'])->name('staff.logout');
});
Route::get('/staff/rooms', [RoomController::class, 'staffRooms'])->name('staff.rooms');
Route::post('/staff/rooms/status', [RoomController::class, 'updateRoomStatus'])->name('staff.rooms.status');
Route::get('/staff/profile', [StaffController::class, 'showStaffProfile'])->name('staff.profile');
Route::post('/staff/profile/update', [StaffController::class, 'updateStaffProfile'])->name('staff.profile.update');

/*
|--------------------------------------------------------------------------
| ADMIN (WEB GUARD)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')->group(function () {

    Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin/bookings', [BookingController::class, 'bookings'])->name('admin.bookings');

    Route::get('/admin/staff', [StaffController::class, 'staff'])->name('admin.staff');
    Route::post('/admin/staff', [StaffController::class, 'storeStaff'])->name('admin.staff.store');
    Route::post('/admin/staff/edit', [StaffController::class, 'editStaff'])->name('admin.staff.edit');
    Route::post('/admin/staff/delete', [StaffController::class, 'deleteStaff'])->name('admin.staff.delete');

    // Route::get('/admin/guests', [GuestController::class, 'guest'])->name('admin.guests');
    // Route::post('/admin/guests', [GuestController::class, 'storeGuests'])->name('admin.guests.store');
    // Route::get('/admin/guests', [GuestController::class, 'listGuests'])->name('admin.guests.list');
    // Route::post('/admin/guests/edit', [GuestController::class, 'editGuest'])->name('admin.guests.edit');
    // Route::post('/admin/guests/delete', [GuestController::class, 'deleteGuest'])->name('admin.guests.delete');

    Route::resource('admin/guests', GuestController::class)->except(['show', 'create']);


    Route::get('/admin/rooms', [RoomController::class, 'rooms'])->name('admin.rooms');
    Route::post('/admin/rooms', [RoomController::class, 'storeRoom'])->name('admin.rooms.store');
    Route::post('/admin/rooms/edit', [RoomController::class, 'editRoom'])->name('admin.rooms.edit');

    Route::get('/admin/payments', [PaymentController::class, 'payments'])->name('admin.payments');
});

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});
