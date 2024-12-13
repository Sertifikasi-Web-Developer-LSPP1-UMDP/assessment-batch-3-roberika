<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Guest
// ..Welcome page untuk login, register, melihat pengumuman
Route::get('/', [AnnouncementController::class, 'welcome'])
    ->name('welcome');

// ..Perlu login dan verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // User
    Route::name('profile.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('destroy');
    });

    // Non Admin
    Route::middleware(['nonadmin'])->group(function () {
        // ..Dashboard untuk menuju ke halaman pendaftaran, melihat pengumuman, melihat status pendaftaran
        Route::get('/dashboard', [DashboardController::class, 'nonadmin'])
            ->name('dashboard');
            
        // ..Halaman pendaftaran dan melihat status pendaftaran lengkap
        Route::middleware(['applicant'])->get('/application', [ApplicantController::class, 'create'])
            ->name('application');
        Route::middleware(['applicant'])->post('/application', [ApplicantController::class, 'store'])
            ->name('application.store');
    });
    
    // Admin
    Route::prefix('/admin')->name('admin.')->middleware(['admin', 'noback'])->group(function () {    
        Route::middleware('auth')->group(function () {
            // ..Dashboard khusus admin
            Route::get('/dashboard', [DashboardController::class, 'admin'])
                ->name('dashboard');

            // ..Admin bisa melihat, mengubah status, dan menghapus user
            Route::prefix('/users')->name('users.')->group(function () {
                Route::get('/', [UserController::class, 'index'])
                    ->name('index');

                Route::patch('/{id}', [UserController::class, 'update'])
                    ->name('update');

                Route::patch('/{id}', [UserController::class, 'destroy'])
                    ->name('destroy');
            });

            // ..Admin bisa melihat, mengubah status, dan menghapus aplikan
            Route::prefix('/applicants')->name('applicants.')->group(function () {
                Route::get('/', [ApplicantController::class, 'index'])
                    ->name('index');

                Route::patch('/{applicant}', [ApplicantController::class, 'update'])
                    ->name('update');

                Route::delete('/{applicant}', [ApplicantController::class, 'destroy'])
                    ->name('destroy');
            });

            // ..Admin bisa mengelola dengan melihat, menambah, mengubah, dan menghapus pengumuman
            Route::prefix('/announcements')->name('announcements.')->group(function () {
                Route::get('/', [AnnouncementController::class, 'index'])
                    ->name('index');

                Route::get('/create', [AnnouncementController::class, 'create'])
                    ->name('create');

                Route::post('/', [AnnouncementController::class, 'store'])
                    ->name('store');

                Route::get('/{announcement}/edit', [AnnouncementController::class, 'edit'])
                    ->name('edit');

                Route::patch('/{announcement}', [AnnouncementController::class, 'update'])
                    ->name('update');

                Route::delete('/{announcement}', [AnnouncementController::class, 'destroy'])
                    ->name('destroy');
            });
        });
    });
});


require __DIR__.'/auth.php';
