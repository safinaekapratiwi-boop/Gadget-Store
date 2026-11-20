@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-heading', 'Dashboard Gadget Store')

@section('content')

<style>
    .gadget-dashboard {
        --gd-navy: #17243b;
        --gd-blue: #4778e6;
        --gd-cyan: #39c6d8;
        --gd-bg: #f4f7fc;
        --gd-text: #263449;
    }

    .gadget-dashboard {
        color: var(--gd-text);
    }

    .gadget-dashboard .dashboard-hero {
        background: linear-gradient(135deg, #17243b, #263e62, #3976bd);
        border-radius: 22px;
        padding: 30px;
        color: white;
        position: relative;
        overflow: hidden;
        margin-bottom: 25px;
    }

    .gadget-dashboard .dashboard-hero::after {
        content: "";
        position: absolute;
        width: 230px;
        height: 230px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        right: -50px;
        top: -85px;
    }

    .gadget-dashboard .hero-title {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .gadget-dashboard .hero-desc {
        color: #d1def5;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .gadget-dashboard .hero-badge {
        display: inline-block;
        padding: 8px 13px;
        border-radius: 50px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.15);
        font-size: 12px;
        color: #e7f5ff;
    }

    .gadget-dashboard .hero-decoration {
        font-size: 90px;
        color: rgba(255,255,255,.13);
        position: absolute;
        right: 35px;
        bottom: -15px;
    }

    .gadget-dashboard .stat-card {
        background: #fff;
        border: 1px solid #edf0f6;
        border-radius: 18px;
        transition: .25s;
        overflow: hidden;
        height: 100%;
    }

    .gadget-dashboard .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px rgba(25, 45, 80, .08) !important;
    }

    .gadget-dashboard .stat-card .card-body {
        padding: 22px;
    }

    .gadget-dashboard .stat-label {
        color: #8995a8;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .gadget-dashboard .stat-number {
        font-size: 30px;
        font-weight: 800;
        color: #24344c;
        margin: 0;
    }

    .gadget-dashboard .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 22px;
    }

    .gadget-dashboard .icon-blue {
        background: #e8f0ff;
        color: #4778e6;
    }

    .gadget-dashboard .icon-cyan {
        background: #e3f8fb;
        color: #24a9c3;
    }

    .gadget-dashboard .icon-purple {
        background: #f0eaff;
        color: #8865d9;
    }

    .gadget-dashboard .icon-orange {
        background: #fff1e2;
        color: #ed9843;
    }

    .gadget-dashboard .dashboard-panel {
        border: 1px solid #edf0f6;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 18px rgba(25,45,80,.035);
        height: 100%;
    }

    .gadget-dashboard .panel-title {
        font-weight: 750;
        font-size: 16px;
        color: #263449;
    }

    .gadget-dashboard .panel-subtitle {
        color: #98a3b5;
        font-size: 12px;
    }

    .gadget-dashboard .chart-container {
        position: relative;
        height: 300px;
    }

    .gadget-dashboard .inventory-value {
        background: linear-gradient(135deg, #e8f3ff, #e9fbfd);
        border-radius: 18px;
        padding: 22px;
        border: 1px solid #e1efff;
    }

    .gadget-dashboard .inventory-value .value {
        font-size: 28px;
        font-weight: 800;
        color: #3475d5;
    }

    .gadget-dashboard .dashboard-table {
        margin-bottom: 0;
    }

    .gadget-dashboard .dashboard-table thead th {
        background: #f7f9fc;
        color: #8793a5;
        border-bottom: 0;
        padding: 13px 15px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        white-space: nowrap;
    }

    .gadget-dashboard .dashboard-table tbody td {
        padding: 15px;
        border-color: #f0f2f6;
        color: #44536a;
        font-size: 13px;
        vertical-align: middle;
    }

    .gadget-dashboard .product-name {
        font-weight: 700;
        color: #25344a;
    }

    .gadget-dashboard .stock-badge {
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        display: inline-block;
    }

    .gadget-dashboard .stock-low {
        background: #fff0ed;
        color: #df654e;
    }

    .gadget-dashboard .stock-medium {
        background: #fff7e6;
        color: #c38b29;
    }

    .gadget-dashboard .stock-good {
        background: #e8f8f0;
        color: #29976a;
    }

    .gadget-dashboard .btn-view {
        border: 1px solid #e5ebf5;
        background: white;
        color: #4778e6;
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 12px;
        font-weight: 600;
        transition: .2s;
    }

    .gadget-dashboard .btn-view:hover {
        background: #4778e6;
        color: white;
    }

    .gadget-dashboard .section-gap {
        margin-bottom: 22px;
    }

    @media(max-width: 768px) {
        .gadget-dashboard .dashboard-hero {
            padding: 23px;
        }

        .gadget-dashboard .hero-title {
            font-size: 23px;
        }

        .gadget-dashboard .hero-decoration {
            font-size: 65px;
            right: 15px;
        }

        .gadget-dashboard .stat-number {
            font-size: 25px;
        }

        .gadget-dashboard .chart-container {
            height: 250px;
        }
    }
</style>

<div class="gadget-dashboard">

    {{-- HERO --}}
    <div class="dashboard-hero">
        <div class="hero-title">
            Welcome to Gadget Store 👋
        </div>

        <p class="hero-desc">
            Pantau inventaris, produk, dan kondisi stok toko dalam satu dashboard.
        </p>

        <span class="hero-badge">
            <i class="bi bi-activity me-1"></i>
            Inventory Management System
        </span>

        <i class="bi bi-cpu hero-decoration"></i>
    </div>

    {{-- STATISTIK --}}
    <div class="row g-3 section-gap">

        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="stat-label mb-0">Total Produk</div>
                        <div class="stat-icon icon-blue">
                            <i class="bi bi-phone"></i>
                        </div>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($totalProducts) }}
                    </h2>

                    <small class="text-secondary">Produk terdaftar</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="stat-label mb-0">Kategori</div>
                        <div class="stat-icon icon-purple">
                            <i class="bi bi-grid"></i>
                        </div>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($totalCategories) }}
                    </h2>

                    <small class="text-secondary">Kategori produk</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="stat-label mb-0">Total Unit Stok</div>
                        <div class="stat-icon icon-cyan">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($totalStock) }}
                    </h2>

                    <small class="text-secondary">Seluruh unit tersedia</small>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="stat-label mb-0">Stok Menipis</div>
                        <div class="stat-icon icon-orange">
                            <i class="bi bi-exclamation-circle"></i>
                        </div>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($lowStockProducts) }}
                    </h2>

                    <small class="text-secondary">Produk dengan stok ≤ 5</small>
                </div>
            </div>
        </div>

    </div>

    {{-- GRAFIK --}}
    <div class="row g-3 section-gap">

        <div class="col-lg-8">
            <div class="dashboard-panel p-4">
                <div class="mb-3">
                    <h5 class="panel-title mb-1">
                        <i class="bi bi-bar-chart-fill me-2 text-primary"></i>
                        Jumlah Produk per Kategori
                    </h5>
                    <div class="panel-subtitle">
                        Perbandingan jumlah produk setiap kategori
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="dashboard-panel p-4">
                <div class="mb-3">
                    <h5 class="panel-title mb-1">
                        <i class="bi bi-pie-chart-fill me-2 text-info"></i>
                        Kondisi Stok
                    </h5>
                    <div class="panel-subtitle">
                        Komposisi stok produk
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="stockChart"></canvas>
                </div>

                <div class="panel-subtitle text-center mt-2">
                    Menipis: 0–5 · Cukup: 6–20 · Banyak: >20
                </div>
            </div>
        </div>

    </div>

    {{-- STOK KATEGORI + NILAI INVENTARIS --}}
    <div class="row g-3 section-gap">

        <div class="col-lg-8">
            <div class="dashboard-panel p-4">
                <div class="mb-3">
                    <h5 class="panel-title mb-1">
                        <i class="bi bi-boxes me-2 text-primary"></i>
                        Total Unit Stok per Kategori
                    </h5>
                    <div class="panel-subtitle">
                        Jumlah unit barang dalam setiap kategori
                    </div>
                </div>

                <div class="chart-container">
                    <canvas id="stockByCategoryChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="dashboard-panel p-4">
                <h5 class="panel-title mb-1">
                    <i class="bi bi-wallet2 me-2 text-primary"></i>
                    Nilai Persediaan
                </h5>

                <div class="panel-subtitle mb-4">
                    Estimasi nilai seluruh stok barang
                </div>

                <div class="inventory-value mb-3">
                    <div class="small text-secondary mb-2">
                        Total nilai inventaris
                    </div>

                    <div class="value">
                        Rp {{ number_format($inventoryValue, 0, ',', '.') }}
                    </div>

                    <i class="bi bi-graph-up-arrow text-primary mt-2"></i>
                </div>

                <p class="small text-secondary mb-0">
                    <i class="bi bi-info-circle me-1"></i>
                    Harga produk dikalikan jumlah stok. Nilai ini bukan omzet atau laba penjualan.
                </p>
            </div>
        </div>

    </div>

    {{-- PRODUK TERBARU --}}
    <div class="dashboard-panel p-0 overflow-hidden mb-4">

        <div class="p-4 d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5 class="panel-title mb-1">
                    <i class="bi bi-clock-history me-2 text-primary"></i>
                    Produk Terbaru
                </h5>

                <div class="panel-subtitle">
                    Daftar produk yang baru ditambahkan
                </div>
            </div>

            <a href="{{ route('products.index') }}" class="btn-view text-decoration-none">
                Lihat semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="table-responsive">
            <table class="table dashboard-table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Status Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($latestProducts as $product)

                        <tr>
                            <td>
                                <span class="text-secondary small">
                                    {{ $product->product_code }}
                                </span>
                            </td>

                            <td>
                                <span class="product-name">
                                    {{ $product->name }}
                                </span>
                            </td>

                            <td>
                                {{ $product->category->name ?? '-' }}
                            </td>

                            <td class="fw-semibold">
                                Rp {{ number_format((float) $product->price, 0, ',', '.') }}
                            </td>

                            <td>
                                {{ number_format($product->stock) }}
                            </td>

                            <td>
                                @if($product->stock <= 5)
                                    <span class="stock-badge stock-low">
                                        <i class="bi bi-exclamation-circle me-1"></i>
                                        Menipis
                                    </span>
                                @elseif($product->stock <= 20)
                                    <span class="stock-badge stock-medium">
                                        <i class="bi bi-clock me-1"></i>
                                        Cukup
                                    </span>
                                @else
                                    <span class="stock-badge stock-good">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Banyak
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <i class="bi bi-inbox fs-2 text-secondary d-block mb-2"></i>
                                <span class="text-secondary">
                                    Belum ada produk. Tambahkan produk untuk melihat ringkasan inventaris.
                                </span>
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>


{{-- NOTIFIKASI STOK --}}
<div class="card shadow-sm border-0 mt-4" style="border-radius:18px; overflow:hidden;">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 font-weight-bold" style="color:#17243b;">
            <i class="fas fa-bell text-warning mr-2"></i>
            Notifikasi Stok
        </h5>
        <small class="text-muted">Produk yang membutuhkan perhatian</small>
    </div>

    <div class="card-body">

        {{-- Ringkasan --}}
        <div class="row mb-4">

            <div class="col-md-6 mb-3">
                <div class="p-3 rounded" style="background:#fff1f1;">
                    <h6 class="text-danger mb-1">Stok Habis</h6>
                    <h3 class="font-weight-bold mb-0">
                        {{ $outOfStockProducts }}
                    </h3>
                    <small class="text-danger">Produk dengan stok 0</small>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="p-3 rounded" style="background:#fff7e8;">
                    <h6 class="text-warning mb-1">Stok Menipis</h6>
                    <h3 class="font-weight-bold mb-0">
                        {{ $criticalStockProducts }}
                    </h3>
                    <small class="text-warning">Produk dengan stok 1–5</small>
                </div>
            </div>

        </div>

        {{-- Daftar Produk --}}
        @if($stockAlerts->count() > 0)

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead style="background:#f4f7fc;">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($stockAlerts as $product)
                            <tr>
                                <td class="font-weight-bold">
                                    {{ $product->name }}
                                </td>

                                <td>
                                    {{ $product->category->name ?? '-' }}
                                </td>

                                <td>
                                    {{ $product->stock }}
                                </td>

                                <td>
                                    @if($product->stock == 0)
                                        <span class="badge badge-danger">
                                            Habis
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            Menipis
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else

            <div class="text-center py-4">
                <i class="fas fa-check-circle text-success fa-2x mb-2"></i>
                <h6 class="text-success font-weight-bold">
                    Semua stok produk aman!
                </h6>
                <small class="text-muted">
                    Tidak ada produk yang perlu segera ditambah stok.
                </small>
            </div>

        @endif

    </div>
</div>


@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const categoryLabels = @json($categoryStats->pluck('name')->values());
    const productCounts = @json($categoryStats->pluck('product_count')->map(fn($v) => (int) $v)->values());
    const stockTotals = @json($categoryStats->pluck('stock_total')->map(fn($v) => (int) $v)->values());
    const stockStatus = @json($stockStatus);

    // Grafik produk per kategori
    new Chart(document.getElementById('categoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Jumlah produk',
                data: productCounts,
                backgroundColor: '#4778e6',
                hoverBackgroundColor: '#2856b9',
                borderRadius: 8,
                maxBarThickness: 55,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: '#edf1f7'
                    }
                }
            }
        }
    });

    // Grafik kondisi stok
    new Chart(document.getElementById('stockChart'), {
        type: 'doughnut',
        data: {
            labels: ['Stok menipis', 'Stok cukup', 'Stok banyak'],
            datasets: [{
                data: stockStatus,
                backgroundColor: ['#f18b72', '#f4bd57', '#42b99b'],
                borderWidth: 0,
                hoverOffset: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '72%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 18
                    }
                }
            }
        }
    });

    // Grafik unit stok per kategori
    new Chart(document.getElementById('stockByCategoryChart'), {
        type: 'bar',
        data: {
            labels: categoryLabels,
            datasets: [{
                label: 'Unit stok',
                data: stockTotals,
                backgroundColor: '#39c6d8',
                hoverBackgroundColor: '#20a5b8',
                borderRadius: 8,
                maxBarThickness: 55,
                borderSkipped: false
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: '#edf1f7'
                    }
                }
            }
        }
    });
</script>

@endpush
