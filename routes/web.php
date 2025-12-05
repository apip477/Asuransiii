<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\SubmissionController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\Admin\WorkController; 
use App\Http\Controllers\Admin\MitraController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\LayananController; 
use App\Http\Controllers\Admin\ClaimController as AdminClaimController; 
use App\Http\Controllers\Admin\ContactController as AdminContactController; 

use Illuminate\Support\Facades\Route;
use App\Models\Work;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;

// 1. JALUR UMUM (Publik)
Route::get('/', function () {
    $mitras = Mitra::all(); 
    $banks = Mitra::where('category', 'bank')->get(); // Dipertahankan untuk debug column error
    return view('home', compact('mitras', 'banks'));
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/produk', function () {
    $products = Product::all(); 
    return view('produk', compact('products'));
})->name('produk');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

// Pre-Registration Flow
Route::get('/pre-register', [LeadController::class, 'create'])->name('pre.register.form');
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');


// 2. RUTE KHUSUS USER (PROFIL, CLAIM, SUBMISSION)
Route::middleware(['auth'])->group(function () {
    
    // User Dashboard & Profil
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.delete');
    
    // Rute Klaim User
    Route::get('/claim/create', [App\Http\Controllers\ClaimController::class, 'create'])->name('claim.create');
    Route::post('/claim', [App\Http\Controllers\ClaimController::class, 'store'])->name('claim.store');
    
    // Rute Submission User
    Route::prefix('user')->group(function () {
        Route::get('/submission/create', [SubmissionController::class, 'create'])->name('user.submission.create');
        Route::post('/submission', [SubmissionController::class, 'store'])->name('user.submission.store');
        Route::get('/submission/success', function () {
            return view('user.submission.success');
        })->name('submission.success');
    });
});


// 3. RUTE KHUSUS ADMIN (Dilindungi Middleware 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // URL: /admin/dashboard - Logika Statistik Admin
    Route::get('/dashboard', function () {
        $worksCount = Work::count();
        $pendingCount = Work::where('status', 'pending')->count();
        $verifiedCount = Work::where('status', 'verified')->count();
        $userCount = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('worksCount', 'pendingCount', 'verifiedCount', 'userCount'));
    })->name('admin.dashboard');

    // --- RUTE RESOURCE MANAJEMEN ---
    
    // 3A. Works Management (Menggantikan work & works)
    Route::resource('works', WorkController::class); 

    // 3B. Mitra Management (Menggantikan duplikasi mitra)
    Route::resource('mitra', MitraController::class)->names('admin.mitra');

    // 3C. Product Management
    Route::resource('products', ProductController::class)->names('admin.products');

    // 3D. Layanan Management
    Route::resource('layanan', LayananController::class);
    
    // 3E. Claims Management
    Route::resource('claims', AdminClaimController::class)->names('admin.claims');

    // 3F. Contacts (Pesan Masuk) - Menggunakan Resource untuk index, show, update, destroy
    Route::resource('contacts', AdminContactController::class)->names('admin.contacts')->only(['index', 'show', 'destroy', 'update']);
    
    // CATATAN: Semua route yang tumpang tindih (layouts, work, duplikasi lainnya) DIHAPUS DARI KODE AKHIR.
});


require __DIR__.'/auth.php';