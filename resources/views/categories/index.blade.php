@extends('layouts.app')

@section('title', 'Kategori Produk')
@section('page_heading', 'Kategori Produk')

@section('content')

<style>
    .category-page { color: #26354a; }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 24px;
    }

    .category-header h3 {
        color: #17243b;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .category-header p {
        color: #8793a5;
        font-size: 13px;
        margin: 0;
    }

    .btn-add-category {
        background: linear-gradient(135deg, #4778e6, #39c6d8);
        border: none;
        color: white;
        padding: 11px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 800;
        text-decoration: none;
    }

    .btn-add-category:hover { color: white; }

    .category-table-card {
        background: white;
        border: 1px solid #e8edf5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(30,50,80,.04);
    }

    .category-table-header {
        padding: 20px 23px;
        border-bottom: 1px solid #edf1f7;
    }

    .category-table-header h5 {
        margin: 0;
        color: #17243b;
        font-weight: 800;
        font-size: 16px;
    }

    .category-table {
        margin: 0;
        min-width: 700px;
    }

    .category-table thead { background: #f6f8fc; }

    .category-table th {
        color: #718096;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .7px;
        padding: 15px;
        border: none;
        white-space: nowrap;
    }

    .category-table td {
        padding: 16px 15px;
        vertical-align: middle;
        border-color: #edf1f7;
        font-size: 13px;
        color: #56657a;
    }

    .category-name {
        font-weight: 800;
        color: #26354a;
    }

    .btn-category-edit, .btn-category-delete {
        padding: 7px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 800;
        border: none;
        text-decoration: none;
    }

    .btn-category-edit {
        background: #edf4ff;
        color: #4778e6;
    }

    .btn-category-delete {
        background: #fff0f2;
        color: #df5470;
    }

    .category-empty {
        text-align: center;
        padding: 40px 20px !important;
        color: #8996a8;
    }
</style>

<div class="category-page">

    <div class="category-header">
        <div>
            <h3>Kategori Produk</h3>
            <p>Kelompokkan produk agar inventaris Gadget Store lebih terorganisir.</p>
        </div>

        <a href="{{ route('categories.create') }}" class="btn-add-category">
            <i class="fas fa-plus mr-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="category-table-card">
        <div class="category-table-header">
            <h5><i class="fas fa-layer-group mr-2"></i> Data Kategori</h5>
        </div>

        <div class="table-responsive">
            <table class="table category-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $loop->index }}</td>

                            <td>
                                <span class="category-name">
                                    {{ $category->name }}
                                </span>
                            </td>

                            <td>
                                {{ $category->description ?? '-' }}
                            </td>

                            <td>
                                {{ $category->products_count ?? $category->products()->count() }}
                            </td>

                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"
                                   class="btn-category-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-category-delete">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="category-empty">
                                <i class="fas fa-folder-open fa-2x mb-3"></i>
                                <p>Belum ada kategori yang ditambahkan.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-3">
            {{ $categories->links() }}
        </div>
    </div>

</div>

@endsection