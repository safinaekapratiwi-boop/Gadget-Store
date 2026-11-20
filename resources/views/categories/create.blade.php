@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page_heading', 'Tambah Kategori')

@section('content')

<div class="category-create-page">

    <div class="mb-4">
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header py-3" style="background:#17243b;color:white;">
            <h6 class="m-0 font-weight-bold">
                <i class="fas fa-layer-group mr-2"></i> Form Kategori
            </h6>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Contoh: Smartphone"
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        placeholder="Masukkan deskripsi kategori"
                    >{{ old('description') }}</textarea>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('categories.index') }}"
                       class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan Kategori
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
