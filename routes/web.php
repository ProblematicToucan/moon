<?php

use App\Livewire\Admin\Exchange\ExchangeCreate;
use App\Livewire\Admin\Exchange\ExchangeTable;
use App\Livewire\Admin\User\UserTable;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile')->name('settings');
    Route::prefix('settings')->group(function () {
        Route::get('profile', Profile::class)->name('settings.profile');
        Route::get('password', Password::class)->name('settings.password');
        Route::get('appearance', Appearance::class)->name('settings.appearance');
    });

    Route::redirect('admin', 'admin/user')->name('admin');
    Route::prefix('admin')->group(function () {
        Route::get('user', UserTable::class)->name('admin.user.index');

        Route::get('exchange', ExchangeTable::class)->name('admin.exchange.index');
        Route::get('exchange/create', ExchangeCreate::class)->name('admin.exchange.create');
    });
});

require __DIR__ . '/auth.php';
