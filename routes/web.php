<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Middleware\Locale;
use App\Models\Quote;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::prefix('{lang?}')->middleware(Locale::class)->group(function () {
    Route::get('/', function () {
        return Inertia::render('Index');
    })->name('home');

    Route::get('/dashboard', function () {
        $quotes = Quote::all(['id', 'quote', 'name']);

        return Inertia::render('Dashboard', [
            'quotes' => $quotes,
        ]);
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/quote/add', function () {
            return Inertia::render('Quote/Add');
        })->name('quote.add');
        Route::post('/quote/add', [QuoteController::class, 'create'])->name('quote.create');
    });
});

require __DIR__.'/auth.php';
