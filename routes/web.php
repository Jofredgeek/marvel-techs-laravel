<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ─── Public routes ────────────────────────────────────────────────────────────
Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/about', [AboutController::class , 'index'])->name('about');

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/', [ServiceController::class , 'index'])->name('index');
    Route::get('/{slug}', [ServiceController::class , 'show'])->name('show');
});

Route::prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', [PortfolioController::class , 'index'])->name('index');
    Route::get('/{slug}', [PortfolioController::class , 'show'])->name('show');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class , 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class , 'show'])->name('show');
});

Route::get('/contact', [ContactController::class , 'create'])->name('contact');
Route::post('/contact', [ContactController::class , 'store'])->name('contact.store');

Route::get('/devis', [QuoteController::class , 'create'])->name('quote');
Route::post('/devis', [QuoteController::class , 'store'])->name('quote.store');

// ─── Auth routes (Breeze) ─────────────────────────────────────────────────────
require __DIR__ . '/auth.php';

// ─── Admin routes ─────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class , 'index'])->name('dashboard');

    // Services CRUD
    Route::resource('services', AdminServiceController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    // Portfolio CRUD
    Route::resource('projects', AdminProjectController::class)->names([
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);

    // Blog CRUD
    Route::resource('posts', AdminPostController::class)->names([
        'index' => 'posts.index',
        'create' => 'posts.create',
        'store' => 'posts.store',
        'edit' => 'posts.edit',
        'update' => 'posts.update',
        'destroy' => 'posts.destroy',
    ]);

    // Contacts
    Route::get('contacts', [AdminContactController::class , 'index'])->name('contacts.index');
    Route::delete('contacts/{contact}', [AdminContactController::class , 'destroy'])->name('contacts.destroy');

    // Quotes
    Route::get('quotes', [AdminQuoteController::class , 'index'])->name('quotes.index');
    Route::delete('quotes/{quote}', [AdminQuoteController::class , 'destroy'])->name('quotes.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');
});

// Alias for tests
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');