@extends('layouts.app')

@section('title', 'Data Produk')
@section('page_heading', 'Data Produk')

@section('content')

<style>
    .product-page {
        color: #26354a;
    }

    .product-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 24px;
    }

    .product-header h3 {
        font-weight: 800;
        color: #17243b;
        margin-bottom: 5px;
    }

    .product-header p {
        color: #8793a5;
        margin: 0;
        font-size: 13px;
    }

    .btn-add-product {
        background: linear-gradient(135deg, #4778e6, #39c6d8);
        border: none;
        color: white;
        padding: 11px 18px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(71,120,230,.2);
    }

    .btn-add-product:hover {
        color: white;
        transform: translateY(-2px);
    }

    .product-filter {
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(30,50,80,.04);
    }

    .product-filter .form-control,
    .product-filter .form-select {
        border-radius: 9px;
        border: 1px solid #e1e8f1;
        padding: 10px 13px;
        font-size: 13px;
    }

    .btn-filter {
        background: #17243b;
        color: white;
        border: none;
        border-radius: 9px;
        padding: 10px 20px;
        font-weight: 700;
    }

    .btn-filter:hover {
        background: #263b5b;
        color: white;
    }

    .product-table-card {
        background: white;
        border-radius: 16px;
        border: 1px solid #e8edf5;
        box-shadow: 0 5px 20px rgba(30,50,80,.04);
        overflow: hidden;
    }

    .product-table-title {
        padding: 20px 22px;
        border-bottom: 1px solid #edf1f7;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-table-title h5 {
        margin: 0;
        color: #17243b;
        font-weight: 800;
    }

    .product-table-title small {
        color: #8996a8;
    }

    .product-table {
        margin: 0;
        min-width: 950px;
    }

    .product-table thead {
        background: #f6f8fc;
    }

    .product-table th {
        color: #718096;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .7px;
        padding: 15px;
        border: none;
        white-space: nowrap;
    }

    .product-table td {
        padding: 13px 15px;
        vertical-align: middle;
        border-color: #edf1f7;
        font-size: 13px;
    }

    .product-image {
        width: 52px;
        height: 52px;
        object-fit: cover;
        border-radius: 11px;
        border: 1px solid #edf1f7;
    }

    .product-no-image {
        width: 52px;
        height: 52px;
        border-radius: 11px;
        background: #edf3ff;
        color: #4778e6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .product-name {
        color: #24344b;
        font-weight: 800;
    }

    .product-code {
        color: #8996a8;
        font-size: 11px;
    }

    .product-category {
        background: #eef4ff;
        color: #4778e6;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .product-price {
        color: #17243b;
        font-weight: 800;
        white-space: nowrap;
    }

    .stock-badge {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .stock-low {
        background: #fff1e7;
        color: #e58b42;
    }

    .stock-empty {
        background: #ffe9ed;
        color: #df5470;
    }

    .stock-safe {
        background: #e6f8f1;
        color: #20a579;
    }

    .btn-product-edit {
        background: #edf4ff;
        color: #4778e6;
        border: none;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
    }

    .btn-product-edit:hover {
        background: #4778e6;
        color: white;
    }

    .btn-product-delete {
        background: #fff0f2;
        color: #df5470;
        border: none;
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 700;
    }

    .btn-product-delete:hover {
        background: #df5470;
        color: white;
    }

    .product-empty {
        text-align: center;
        padding: 50px 20px !important;
        color: #8b98aa;
    }

    .product-empty i {
        font-size: 35px;
        color: #b8c9e6;
        display: block;
        margin-bottom: 12px;
    }

    @media(max-width:768px) {
        .product-header {
            align-items: flex-start;
        }

        .product-filter {
            padding: 15px;
        }
    }
</style>

<div class="product-page">

    {{-- HEADER --}}
    <div class="product-header">
        <div>
            <h3>📦 Data Produk</h3>
            <p>Kelola seluruh produk Gadget Store dengan mudah.</p>
        </div>

        <a href="{{ route('products.create') }}" class="btn-add-product">
            <i class="fas fa-plus mr-1"></i> Tambah Produk
        </a>
    </div>

    {{-- SEARCH & FILTER --}}
    <div class="product-filter">
        <form method="GET" class="row align-items-center">

            <div class="col-md-5 mb-2">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    class="form-control"
                    placeholder="Cari kode, nama, atau merek produk..."
                >
            </div>

            <div class="col-md-4 mb-2">
                <select name="category_id" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            @selected(request('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 mb-2 d-flex">
                <button type="submit" class="btn-filter w-100">
                    <i class="fas fa-search mr-1"></i> Cari Produk
                </button>
            </div>

        </form>
    </div>

    {{-- TABLE --}}
    <div class="product-table-card">

        <div class="product-table-title">
            <div>
                <h5><i class="fas fa-box-open mr-2" style="color:#4778e6"></i>Daftar Produk</h5>
                <small>Data inventaris produk Gadget Store</small>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table product-table">

                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Kode</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($products as $product)

                        <tr>
                            {{-- GAMBAR --}}
                            <td>
                                @if($product->image)
                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="product-image"
                                    >
                                @else
                                    <div class="product-no-image">
                                        <i class="fas fa-mobile-alt"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- KODE --}}
                            <td>
                                <span class="product-code">
                                    {{ $product->product_code }}
                                </span>
                            </td>

                            {{-- NAMA --}}
                            <td>
                                <span class="product-name">
                                    {{ $product->name }}
                                </span>
                            </td>

                            {{-- KATEGORI --}}
                            <td>
                                <span class="product-category">
                                    {{ $product->category->name ?? '-' }}
                                </span>
                            </td>

                            {{-- MEREK --}}
                            <td>{{ $product->brand ?? '-' }}</td>

                            {{-- HARGA --}}
                            <td>
                                <span class="product-price">
                                    Rp {{ number_format((float)$product->price, 0, ',', '.') }}
                                </span>
                            </td>

                            {{-- STOK --}}
                            <td>
                                @if($product->stock <= 0)
                                    <span class="stock-badge stock-empty">
                                        Habis
                                    </span>
                                @elseif($product->stock <= 5)
                                    <span class="stock-badge stock-low">
                                        {{ $product->stock }} Unit
                                    </span>
                                @else
                                    <span class="stock-badge stock-safe">
                                        {{ $product->stock }} Unit
                                    </span>
                                @endif
                            </td>

                            {{-- AKSI --}}
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px;">

                                    <a href="{{ route('products.edit', $product) }}"
                                       class="btn-product-edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form method="POST"
                                          action="{{ route('products.destroy', $product) }}"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-product-delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="product-empty">
                                <i class="fas fa-box-open"></i>
                                <strong>Belum ada produk</strong>
                                <p class="mb-0 mt-2">Silakan tambahkan produk terlebih dahulu.</p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        <div class="p-3 d-flex justify-content-end">
            {{ $products->links() }}
        </div>

    </div>

</div>

@endsection
```