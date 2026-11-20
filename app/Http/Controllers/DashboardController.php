<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalStock = (int) Product::sum('stock');

        // Jumlah produk yang stoknya menipis atau habis
        $lowStockProducts = Product::where('stock', '<=', 5)->count();

        // Nilai seluruh inventaris
        $inventoryValue = (float) Product::selectRaw(
            'COALESCE(SUM(price * stock), 0) as total'
        )->value('total');

        // Statistik kategori
        $categoryStats = Category::query()
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->select(
                'categories.id',
                'categories.name',
                DB::raw('COUNT(products.id) as product_count'),
                DB::raw('COALESCE(SUM(products.stock), 0) as stock_total')
            )
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('categories.name')
            ->get();

        // Kondisi stok
        $stockStatus = [
            Product::where('stock', '<=', 5)->count(),
            Product::whereBetween('stock', [6, 20])->count(),
            Product::where('stock', '>', 20)->count(),
        ];

        // Lima produk terbaru
        $latestProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        // Daftar produk yang perlu diperhatikan stoknya
        $stockAlerts = Product::with('category')
            ->where('stock', '<=', 5)
            ->orderBy('stock', 'asc')
            ->get();

        // Jumlah produk yang stoknya habis
        $outOfStockProducts = Product::where('stock', 0)->count();

        // Jumlah produk yang stoknya menipis
        $criticalStockProducts = Product::whereBetween('stock', [1, 5])->count();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'lowStockProducts',
            'inventoryValue',
            'categoryStats',
            'stockStatus',
            'latestProducts',
            'stockAlerts',
            'outOfStockProducts',
            'criticalStockProducts'
        ));
    }
}
