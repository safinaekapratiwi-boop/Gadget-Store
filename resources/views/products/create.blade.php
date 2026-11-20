@extends('layouts.app')

@section('title', 'Tambah Produk')
@section('page_heading', 'Tambah Produk')

@section('content')

<style>
    .create-product-page {
        color: #26354a;
    }

    .create-product-header {
        margin-bottom: 25px;
    }

    .create-product-header h3 {
        color: #17243b;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .create-product-header p {
        color: #8793a5;
        font-size: 13px;
        margin: 0;
    }

    .create-product-card {
        background: #fff;
        border-radius: 17px;
        border: 1px solid #e8edf5;
        box-shadow: 0 5px 20px rgba(30,50,80,.05);
        overflow: hidden;
    }

    .create-product-card-header {
        padding: 20px 25px;
        background: linear-gradient(135deg, #17243b, #263c5e);
        color: white;
    }

    .create-product-card-header h5 {
        font-weight: 800;
        margin: 0;
        font-size: 16px;
    }

    .create-product-card-header p {
        margin: 5px 0 0;
        font-size: 12px;
        color: #b8c9e2;
    }

    .create-product-card-body {
        padding: 25px;
    }

    .create-product-card-body label {
        color: #34445b;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .create-product-card-body .form-control,
    .create-product-card-body .form-select {
        border: 1px solid #e1e8f1;
        border-radius: 10px;
        padding: 11px 13px;
        font-size: 13px;
        color: #34445b;
        transition: .2s;
    }

    .create-product-card-body .form-control:focus,
    .create-product-card-body .form-select:focus {
        border-color: #4778e6;
        box-shadow: 0 0 0 3px rgba(71,120,230,.1);
    }

    .create-product-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #edf1f7;
    }

    .btn-save-product {
        background: linear-gradient(135deg, #4778e6, #39c6d8);
        color: white;
        border: none;
        padding: 11px 22px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
    }

    .btn-save-product:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(71,120,230,.2);
    }

    .btn-back-product {
        background: #f1f4f9;
        color: #64748b;
        padding: 11px 20px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
    }

    .btn-back-product:hover {
        background: #e5ebf4;
        color: #26354a;
    }

    .product-info-note {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        background: #f1f7ff;
        border: 1px solid #e0edff;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 22px;
    }

    .product-info-note i {
        color: #4778e6;
        margin-top: 2px;
    }

    .product-info-note p {
        color: #64748b;
        font-size: 12px;
        margin: 0;
        line-height: 1.6;
    }
</style>

<div class="create-product-page">

    <div class="create-product-header">
        <h3>✨ Tambah Produk Baru</h3>
        <p>Tambahkan produk baru ke inventaris Gadget Store.</p>
    </div>

    <div class="create-product-card">

        <div class="create-product-card-header">
            <h5><i class="fas fa-box-open mr-2"></i> Informasi Produk</h5>
            <p>Lengkapi detail produk yang ingin ditambahkan.</p>
        </div>

        <div class="create-product-card-body">

            <div class="product-info-note">
                <i class="fas fa-info-circle"></i>
                <p>
                    Pastikan informasi produk diisi dengan benar agar data inventaris
                    tersimpan dan mudah dikelola.
                </p>
            </div>

            <form method="POST"
                  action="{{ route('products.store') }}"
                  enctype="multipart/form-data">

                @csrf

                @include('products._form')

                <div class="create-product-actions">

                    <button type="submit" class="btn-save-product">
                        <i class="fas fa-save mr-1"></i> Simpan Produk
                    </button>

                    <a href="{{ route('products.index') }}" class="btn-back-product">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
```