@extends('layouts.app')
@section('title','Tambah Kategori')
@section('content')

<h3>Tambah Kategori</h3>

<form method="POST" action="{{ route('categories.store') }}">
@csrf

<div class="mb-3">
    <label>Nama kategori</label>
    <input name="name" class="form-control" value="{{ old('name') }}">
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskription" class="form-control">{{ old('deskription') }}</textarea>
</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select">
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
    @error('status')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>

</form>
@endsection
