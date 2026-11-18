@extends('layouts.app')
@section('title','Edit Kategori')
@section('content')

<h3>Edit Kategori</h3>

<form method="POST" action="{{ route('categories.update',$category) }}">
@csrf
@method('PUT')

<div class="mb-3">
    <label>Nama kategori</label>
    <input name="name" class="form-control" value="{{ old('name',$category->name) }}">
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskription" class="form-control">{{ old('deskription',$category->deskription) }}</textarea>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
        <option value="Aktif" {{ old('status',$category->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
        <option value="Tidak Aktif" {{ old('status',$category->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
    </select>
</div>

<div class="mb-3">
    <label>Jumlah Stok</label>
    <input type="number" name="stock" class="form-control"
        value="{{ old('stock', $category->stock) }}" min="0">
    @error('stock')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button class="btn btn-primary">Simpan Perubahan</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>

</form>
@endsection
