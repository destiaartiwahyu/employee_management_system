<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Users;
use App\Http\Livewire\Divisions;
use App\Http\Livewire\Positions;
use App\Http\Livewire\PositionUsers;
use App\Http\Livewire\Dashboard;
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

Route::get('/', Login::class)->name('login');
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('home', Dashboard::class)->name('home');
    Route::get('user', Users::class)->name('users');
    Route::get('division', Divisions::class)->name('divisions');
    Route::get('position', Positions::class)->name('positions');
    Route::get('position-user', PositionUsers::class)->name('position-users');
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');


    Route::post('logout', LogoutController::class)
        ->name('logout');
});

