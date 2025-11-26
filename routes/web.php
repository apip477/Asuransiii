<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\WorkController; 
use App\Http\Controllers\User\SubmissionController; 
use Illuminate\Support\Facades\Route;
use App\Models\Work; 
use App\Models\User; 

// 1. JALUR UMUM (Publik)
Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/produk', function () {
    return view('produk');
})->name('produk');

// 2. JALUR KHUSUS USER (Wajib Login)
// Halaman dashboard user biasa
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');


// 3. RUTE USER (PROFIL & SUBMISSION)
Route::middleware('auth')->group(function () {
    
    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rute Submission User
    Route::prefix('user')->group(function () {
        Route::get('/submission/create', [SubmissionController::class, 'create'])->name('user.submission.create');
        Route::post('/submission', [SubmissionController::class, 'store'])->name('user.submission.store');
    });

});


// 4. RUTE KHUSUS ADMIN (Dilindungi Middleware 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // URL: /admin/dashboard - Logika Statistik Admin
    Route::get('/dashboard', function () {
        $worksCount = Work::count();
        $pendingCount = Work::where('status', 'pending')->count();
        $verifiedCount = Work::where('status', 'verified')->count();
        $userCount = User::where('role', 'user')->count();
        
        return view('admin.dashboard', compact('worksCount', 'pendingCount', 'verifiedCount', 'userCount')); 
    })->name('admin.dashboard');

    // Rute Manajemen Karya Cipta/Pengajuan
    Route::resource('works', App\Http\Controllers\Admin\WorkController::class);

});


require __DIR__.'/auth.php';