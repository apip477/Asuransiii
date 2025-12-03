<?php
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\SubmissionController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ContactController; // Controller Publik (Hanya untuk store)
use App\Http\Controllers\Admin\WorkController; 
use App\Http\Controllers\Admin\MitraController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\ContactController as AdminContactController; // Alias Admin Contact
use App\Http\Controllers\Admin\LayananController; 
use Illuminate\Support\Facades\Route;
use App\Models\Work;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Product;

// 1. JALUR UMUM (Publik)
Route::get('/', function () {
    $mitras = Mitra::all();
    return view('home', compact('mitras'));
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
Route::get('/pre-register', function () {
    return view('pre-register');
})->name('pre.register.form');
Route::post('/lead', [LeadController::class, 'store'])->name('lead.store');



// 3. RUTE USER (PROFIL & SUBMISSION)
Route::middleware('auth')->group(function () {

    Route::get('/claim/create', [ClaimController::class, 'create'])->name('claim.create');
    Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');
    Route::get('/submission/success', function () {
    return view('user.submission.success');
})->middleware(['auth'])->name('submission.success');
});






// 2. JALUR KHUSUS USER (Wajib Login)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // User Dashboard & Profil
    Route::get('/dashboard', function () {
        return view('dashboard'); 
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
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

    // --- RUTE RESOURCE MANAJEMEN (HANYA SATU DEFINISI) ---
    
    // 3A. Works Management (Verifikasi Pengajuan) - works.index, works.show, works.update
    Route::resource('works', WorkController::class); 

    // 3B. Mitra Management
    Route::resource('mitra', MitraController::class);

    // 3C. Product Management
    Route::resource('products', ProductController::class)->names('admin.products');

    // 3D. Contacts (Pesan Masuk) - Menggunakan Controller Admin yang terpisah
    // URL: /admin/contacts (admin.contacts.index)
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index'); 
    // CATATAN: Hapus semua route PATCH/DELETE manual kontak, karena Anda harus menambahkannya melalui Route::resource jika dibutuhkan.
    
    // CATATAN: Route 'layanan' dan 'work' yang tumpang tindih telah dihapus.
    Route::resource('layanan', App\Http\Controllers\Admin\LayananController::class)->names('admin.layanan');

    Route::resource('mitra', App\Http\Controllers\Admin\MitraController::class)->names('admin.mitra');

    Route::resource('work', App\Http\Controllers\Admin\WorkController::class)->names('admin.work');
});


require __DIR__.'/auth.php';