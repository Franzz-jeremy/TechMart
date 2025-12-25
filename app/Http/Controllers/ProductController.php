<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function userIndex(Request $request) // Tambahkan Request $request di sini
{
    // 1. Ambil semua kategori untuk menu filter
    $categories = Category::all();

    // 2. Mulai query produk yang stoknya > 0
    $query = Product::query()->where('stock', '>', 0);

    // 3. Cek apakah user sedang memilih kategori tertentu (lewat URL ?category=slug)
    if ($request->has('category') && $request->category != '') {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    // 4. Eksekusi query dan ambil hasilnya
    $products = $query->latest()->get();

    // 5. Kirim KEDUA variabel ke view (HANYA SATU RETURN DI AKHIR)
    return view('menu', compact('products', 'categories'));
}

public function userMenu()
{
    // Mengambil semua produk agar bisa ditampilkan di halaman depan
    $products = Product::all(); 
    
    // Pastikan nama file view-nya sesuai (misal: resources/views/user/menu.blade.php atau menu.blade.php)
    return view('menu', compact('products'));
}

public function index()
{
    $products = Product::with('category')->get();
    return view('admin.products.index', compact('products'));
}

    public function create()
{
    $categories = Category::all(); // Mengambil kategori untuk dropdown
    return view('admin.products.create', compact('categories'));
}

public function store(Request $request)
{
    // 1. Validasi Input
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'description' => 'nullable|string',
    ]);

    // 2. Handle Upload Gambar
    $imagePath = $request->file('image')->store('products', 'public');

    // 3. Simpan ke Database
    Product::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imagePath,
        'description' => $request->description,
    ]);

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
}

// Menampilkan halaman edit
public function edit(Product $product)
{
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

// Memproses perubahan data
public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'description' => 'nullable|string',
    ]);

    $data = $request->all();

    // Jika ada foto baru yang diupload
    if ($request->hasFile('image')) {
        // Hapus foto lama dari storage agar tidak memenuhi server
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        // Simpan foto baru
        $data['image'] = $request->file('image')->store('products', 'public');
    } else {
        // Jika tidak upload foto baru, gunakan foto lama
        $data['image'] = $product->image;
    }

    $product->update($data);

    return redirect()->route('products.index')->with('success', 'Data produk berhasil diperbarui!');
}

public function destroy(Product $product)
{
    // Hapus foto dari storage
    if ($product->image) {
        Storage::disk('public')->delete($product->image);
    }

    // Hapus data dari database
    $product->delete();

    return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
}

}
