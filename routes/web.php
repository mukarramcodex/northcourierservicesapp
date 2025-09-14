<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TrackingLogController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('payments', PaymentController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('parcels', ParcelController::class);
    Route::resource('revenues', RevenueController::class);
    Route::resource('setting', SettingController::class)->only(['index', 'edit', 'update']);
    Route::resource('pages', PageController::class);
    Route::resource('trackinglogs', TrackingLogController::class);
});

Route::get('/parcels/{tracking_number}/download', [ParcelController::class, 'parcelpdf'])
        ->name('parcels.download');

// Route::prefix('parcels/{parcel}')->group(function () {
//     Route::get('logs', [ParcelTrackingLogController::class, 'index'])->name('parcels.logs.index');
//     Route::get('logs/create', [ParcelTrackingLogController::class, 'create'])->name('parcels.logs.create');
//     Route::post('logs', [ParcelTrackingLogController::class, 'store'])->name('parcels.logs.store');
// });


require __DIR__.'/auth.php';
