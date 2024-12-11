<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// User
// ..Welcome page untuk login, register, melihat pengumuman
Route::get('/', function () {
    return view('welcome');
});

// ..Perlu login dan verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // ..Dashboard untuk menuju ke halaman pendaftaran, melihat pengumuman, melihat status pendaftaran
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ..Halaman pendaftaran dan melihat status pendaftaran lengkap
    Route::middleware(['nonadmin'])->get('/application', function () {
        return view('application');
    })->name('application');

    Route::name('profile.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('destroy');
    });
    
    // Admin
    Route::prefix('/admin')->name('admin.')->middleware(['admin'])->group(function () {    
        Route::middleware('auth')->group(function () {
            // ..Halaman dashboard admin
            Route::get('/dashboard', function () {
                return view('admin.dashboard');
            })->name('dashboard');

            // ..Admin bisa melihat, mengubah status, dan menghapus user
            Route::prefix('/users')->name('users.')->group(function () {
                Route::get('/', function () {
                    return view('admin.users');
                })->name('index');

                Route::patch('/{user}', function () {
                    return redirect()->route('admin.users');
                })->name('update');

                Route::delete('/{user}', function () {
                    return redirect()->route('admin.users');
                })->name('destroy');
            });

            // ..Admin bisa melihat, mengubah status, dan menghapus aplikan
            Route::prefix('/applicants')->name('applicants.')->group(function () {
                Route::get('/', function () {
                    return view('admin.applicants');
                })->name('index');

                Route::patch('/{applicant}', function () {
                    return redirect()->route('admin.applicants');
                })->name('update');

                Route::delete('/{applicant}', function () {
                    return redirect()->route('admin.applicants');
                })->name('destroy');
            });

            // ..Admin bisa mengelola dengan melihat, menambah, mengubah, dan menghapus pengumuman
            Route::prefix('/announcements')->name('announcements.')->group(function () {
                Route::get('/', function () {
                    return view('admin.announcements.index');
                })->name('index');

                Route::get('/create', function () {
                    return view('admin.announcements.create');
                })->name('create');

                Route::post('/', function () {
                    return redirect()->route('admin.announcements.index');
                })->name('store');

                Route::get('/{announcement}/edit', function () {
                    return view('admin.announcements.edit');
                })->name('edit');

                Route::patch('/{announcement}', function () {
                    return redirect()->route('admin.announcements.index');
                })->name('update');

                Route::delete('/{announcement}', function () {
                    return redirect()->route('admin.announcements.index');
                })->name('destroy');
            });
        });
    });
});


require __DIR__.'/auth.php';
