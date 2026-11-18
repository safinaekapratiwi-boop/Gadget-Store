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

        $lowStockProducts = Product::where('stock', '<=', 5)->count();

        $inventoryValue = (float) Product::selectRaw(
            'COALESCE(SUM(price * stock), 0) as total'
        )->value('total');

        // Data jumlah produk dan stok setiap kategori
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

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalStock',
            'lowStockProducts',
            'inventoryValue',
            'categoryStats',
            'stockStatus',
            'latestProducts'
        ));
    }
}
