<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori
    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->paginate(10);

        return view('categories.index', compact('categories'));
    }

    // Menampilkan form tambah kategori
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:categories,name'],
            'deskription' => ['nullable', 'string', 'max:1000'],
        ]);

        $category = Category::create($validated);

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Tambah Kategori',
            'description' => 'Menambahkan kategori ' . $category->name,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Memperbarui kategori
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name')->ignore($category->id)
            ],
            'deskription' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::in(['Aktif', 'Tidak Aktif'])],
        ]);

        $category->update($validated);

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Edit Kategori',
            'description' => 'Mengubah kategori ' . $category->name,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        if ($category->products()->exists()) {
            return back()->with('error', 'Kategori masih digunakan oleh produk.');
        }

        $categoryName = $category->name;

        $category->delete();

        // Catat aktivitas
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'Hapus Kategori',
            'description' => 'Menghapus kategori ' . $categoryName,
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
