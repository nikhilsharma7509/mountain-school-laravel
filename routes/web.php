<?php

use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\NewsEventController as AdminNewsEventController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Website Routes
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/news-events', [FrontendController::class, 'index'])->name('news-events.index');
Route::get('/news-events/{slug}', [FrontendController::class, 'show'])->name('news-events.show');

// AJAX Admission Enquiry Submission
Route::post('/enquiries', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('enquiries.store');

// Breeze default dashboard redirect -> Admin Panel
Route::get('/dashboard', fn() => redirect()->route('admin.news-events.index'))
    ->middleware(['auth'])
    ->name('dashboard');

// Admin Panel Routes (Protected by Auth)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.news-events.index'))->name('dashboard');
    Route::resource('news-events', AdminNewsEventController::class)->except(['show']);
    Route::get('enquiries', [AdminEnquiryController::class, 'index'])->name('enquiries.index');
    Route::patch('enquiries/{enquiry}/status', [AdminEnquiryController::class, 'updateStatus'])->name('enquiries.status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
