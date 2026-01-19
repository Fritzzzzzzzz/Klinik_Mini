<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Auth\ResetPasswordController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\QueueManageController;
use Termwind\Components\Raw;

/*
|--------------------------------------------------------------------------
| Root (SMART REDIRECT)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    if (auth()->check()) {
        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.home');
    }

    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/queue', [QueueController::class, 'store'])
        ->name('queue.store');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes([
    'reset' => false,
]);

Route::get('/forgot-password', [ResetPasswordController::class, 'form'])
    ->name('password.request');

Route::post('/forgot-password', [ResetPasswordController::class, 'checkEmail'])
    ->name('password.check');

Route::get('/reset-password/{email}', [ResetPasswordController::class, 'resetForm'])
    ->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'update'])
    ->name('password.update');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')
    ->prefix('user')
    ->group(function () {

        Route::get('/home', function () {
            return view('user.home');
        })->name('user.home');

        Route::get('/dashboard', [UserDashboardController::class, 'index'])
            ->name('user.dashboard');

        Route::get('/appointment', [QueueController::class, 'create'])
            ->name('queue.create');

        Route::post('/appointment', [QueueController::class, 'store'])
            ->name('queue.store');

        Route::post('/queue/{queue}/cancel', [QueueController::class, 'cancel'])
            ->name('queue.cancel');
    });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'can:isAdmin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('poli', PoliController::class);
        Route::resource('doctor', DoctorController::class);

        Route::post('/queue/call/{doctor}', [QueueManageController::class, 'callNext'])
            ->name('admin.queue.call');
    });