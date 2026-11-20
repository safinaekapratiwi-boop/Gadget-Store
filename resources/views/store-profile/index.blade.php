@extends('layouts.app')

@section('title', 'Profil Toko')

@section('page_heading', 'Profil Toko')

@section('content')

<style>
    .store-profile-card {
        background: white;
        border-radius: 20px;
        border: 1px solid #e8edf5;
        overflow: hidden;
    }

    .store-banner {
        background: linear-gradient(135deg, #17243b, #244b80, #39c6d8);
        padding: 35px;
        color: white;
    }

    .store-logo {
        width: 95px;
        height: 95px;
        border-radius: 22px;
        background: white;
        color: #2457c5;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        margin-bottom: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .store-info-card {
        border: 1px solid #edf0f6;
        border-radius: 15px;
        padding: 20px;
        height: 100%;
        transition: 0.2s;
    }

    .store-info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(23,36,59,0.07);
    }

    .store-info-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #eef5ff;
        color: #4778e6;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .store-label {
        font-size: 12px;
        color: #8995a8;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 7px;
    }

    .store-value {
        color: #17243b;
        font-weight: 700;
        font-size: 15px;
    }
</style>

<div class="mb-4">
    <h4 class="font-weight-bold" style="color:#17243b;">
        <i class="fas fa-store mr-2" style="color:#39c6d8;"></i>
        Informasi Toko
    </h4>
    <p class="text-muted">
        Informasi identitas dan profil Gadget Store.
    </p>
</div>

<div class="store-profile-card shadow-sm mb-4">

    <div class="store-banner">
        <div class="store-logo">
            <i class="fas fa-microchip"></i>
        </div>

        <h2 class="font-weight-bold mb-2">GADGET STORE</h2>

        <p class="mb-0" style="opacity:0.85;">
            Your Technology, Your Lifestyle.
        </p>

        <span class="badge badge-light mt-3 px-3 py-2">
            <i class="fas fa-check-circle text-success mr-1"></i>
            Toko Elektronik
        </span>
    </div>

    <div class="p-4">
        <div class="row">

            <div class="col-md-6 mb-3">
                <div class="store-info-card">
                    <div class="store-info-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <div class="store-label">Nama Toko</div>
                    <div class="store-value">Gadget Store</div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="store-info-card">
                    <div class="store-info-icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <div class="store-label">Jenis Usaha</div>
                    <div class="store-value">Penjualan Gadget & Elektronik</div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="store-info-card">
                    <div class="store-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="store-label">Alamat</div>
                    <div class="store-value">Semarang, Jawa Tengah</div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="store-info-card">
                    <div class="store-info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="store-label">Kontak</div>
                    <div class="store-value">Belum diatur</div>
                </div>
            </div>

        </div>

        <div class="mt-3 p-4 rounded" style="background:#f4f7fc;">
            <h6 class="font-weight-bold" style="color:#17243b;">
                <i class="fas fa-info-circle mr-2" style="color:#4778e6;"></i>
                Tentang Toko
            </h6>

            <p class="text-muted mb-0">
                Gadget Store menyediakan berbagai produk teknologi dan elektronik
                untuk mendukung kebutuhan digital sehari-hari, mulai dari aksesoris,
                perangkat elektronik, hingga gadget berkualitas dengan harga bersaing.
            </p>
        </div>

    </div>
</div>

@endsection
