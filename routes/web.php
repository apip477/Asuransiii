<?php
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\SubmissionController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\Admin\SubmissionController as AdminSubmissionController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ClaimController as AdminClaimController;
use Illuminate\Support\Facades\Route;
use App\Models\Work;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;


// 1. JALUR UMUM (Publik)
Route::get('/', function () {
    $mitras = Mitra::all();
    return view('home', compact('mitras',));
})->name('home');
// Public contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-us', function () {
    return view('about');
})->name('about');
Route::get('/produk', function () {
    $products = \App\Models\Product::all();
    return view('produk', compact('products'));
})->name('produk');
// --- RUTE BARU: PRE-REGISTRATION FORM ---
Route::get('/pre-register', function () {
    return view('pre-register');
})->name('pre.register.form');
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');
Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');
// 2. JALUR KHUSUS USER (Wajib Login)
// Halaman dashboard user biasa
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');
// routes/web.php

// 3. RUTE USER (PROFIL & SUBMISSION)
Route::middleware('auth')->group(function () {
    Route::get('/claim/create', [ClaimController::class, 'create'])->name('claim.create');
    Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');

    Route::get('/submission/success', function () {
    return view('user.submission.success');
})->middleware(['auth'])->name('submission.success');

    
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


// 4. RUTE KHUSUS ADMIN 
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // URL: /admin/layouts 
    Route::get('/layouts', function () {
        return view('admin.layouts.app');
    })->name('admin.layouts');

    // URL: /admin/dashboard 
    Route::get('/dashboard', function () {
        $worksCount = Work::count();
        $pendingCount = Work::where('status', 'pending')->count();
        $verifiedCount = Work::where('status', 'verified')->count();
        $userCount = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('worksCount', 'pendingCount', 'verifiedCount', 'userCount'));
    })->name('admin.dashboard');

    // Rute Manajemen Karya Cipta/Pengajuan
    Route::resource('works', App\Http\Controllers\Admin\WorkController::class);

    // Rute Manajemen Layanan
    Route::resource('layanan', App\Http\Controllers\Admin\LayananController::class)->names('admin.layanan');

    // Rute Manajemen Mitra
    Route::resource('mitra', App\Http\Controllers\Admin\MitraController::class)->names('admin.mitra');
    // Rute Manajmen work
    Route::resource('work', App\Http\Controllers\Admin\WorkController::class)->names('admin.work');

    // Rute Manajemen Products
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class)->names('admin.products');

    Route::resource('claims', App\Http\Controllers\Admin\ClaimController::class)->names('admin.claims');

// Rute contact
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::patch('/contacts/{contact}/mark-read', [ContactController::class, 'markRead'])->name('admin.contacts.mark-read');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index'); 



    Route::get('/admin/submissions', [AdminSubmissionController::class, 'index'])->name('admin.submissions.index');

});

require __DIR__.'/auth.php';