<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->filled('q'), function ($query) use ($request) {
                $keyword = $request->string('q')->toString();

                $query->where(function ($q) use ($keyword) {
                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('Product_code', 'like', "%{$keyword}%")
                        ->orWhere('brand', 'like', "%{$keyword}%");
                });
            })
            ->when($request->filled('category_id'),
                fn ($q) => $q->where('category_id', $request->category_id))
            ->latest()->paginate(10)->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'Product_code' => ['required', 'string', 'max:50', 'unique:products,Product_code'],
            'name' => ['required', 'string', 'max:150'],
            'brand' => ['nullable', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'deskription' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('product_images', 'public');
        }

        $product = Product::create($validated);

        // Catat aktivitas tambah produk
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Tambah Produk',
            'description' => 'Menambahkan produk ' . $product->name,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'Product_code' => [
                'required', 'string', 'max:50',
                Rule::unique('products', 'Product_code')->ignore($product->id)
            ],
            'name' => ['required', 'string', 'max:150'],
            'brand' => ['nullable', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'deskription' => ['nullable', 'string', 'max:2000'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif', 'max:5048'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('product_images', 'public');
        }

        $product->update($validated);

        // Catat aktivitas edit produk
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Edit Produk',
            'description' => 'Mengubah data produk ' . $product->name,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $productName = $product->name;

        $product->delete();

        // Catat aktivitas hapus produk
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Hapus Produk',
            'description' => 'Menghapus produk ' . $productName,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
