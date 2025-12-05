<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage; 

class ProductController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index(): View
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Menyimpan produk baru dan mengunggah gambar.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        // 2. Upload Gambar
        $imagePath = $request->file('image_path')->store('products', 'public');
        
        // 3. Generate Slug
        $slug = Str::slug($validated['name']);

        // 4. Simpan Data ke Database
        Product::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'category' => $validated['category'],
            'description' => $validated['description'],
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produk baru berhasil ditambahkan beserta gambarnya.');
    }
    
    /**
     * Menampilkan form edit produk.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Memperbarui produk yang sudah ada, termasuk mengganti gambar.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id, // Abaikan ID produk ini sendiri
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gambar opsional saat update
        ]);

        $data = $validated;
        
        // 2. Handle Gambar Baru (Jika Ada)
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            // Upload gambar baru
            $data['image_path'] = $request->file('image_path')->store('products', 'public');
        }

        // 3. Generate Slug baru jika nama berubah
        if ($data['name'] !== $product->name) {
             $data['slug'] = Str::slug($validated['name']);
        }
        
        // 4. Update Data
        $product->update($data);

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dan file gambarnya.
     */
    public function destroy(Product $product): RedirectResponse
    {
        // Hapus file gambar dari storage
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // Hapus record dari database
        $product->delete();

        return redirect()->route('admin.products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}