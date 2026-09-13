<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GalleryImageController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminEnquiryController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/our-team', [PageController::class, 'ourTeam'])->name('our-team');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('admin/enquiries', AdminEnquiryController::class)->only(['index', 'show', 'update', 'destroy'])->names('admin.enquiries');
    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::resource('admin/services', AdminServiceController::class)->except('show')->names('admin.services');
    Route::resource('gallery-images', GalleryImageController::class)->except('show');
    Route::resource('team-members', TeamMemberController::class)->except('show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
