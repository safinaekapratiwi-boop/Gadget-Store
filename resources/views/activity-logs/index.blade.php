@extends('layouts.app')

@section('title', 'Log Aktivitas')
@section('page_heading', 'Log Aktivitas')

@section('content')

<style>
    .activity-card {
        background: white;
        border-radius: 18px;
        border: 1px solid #e8edf5;
        overflow: hidden;
    }

    .activity-header {
        background: linear-gradient(135deg, #17243b, #244b80);
        color: white;
        padding: 25px;
    }

    .activity-icon {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(57,198,216,0.15);
        color: #39c6d8;
        font-size: 18px;
    }

    .activity-table thead {
        background: #f4f7fc;
    }

    .activity-table th {
        border: none;
        color: #718096;
        font-size: 12px;
        text-transform: uppercase;
        padding: 15px;
    }

    .activity-table td {
        padding: 16px 15px;
        vertical-align: middle;
        color: #34445b;
    }

    .activity-badge {
        background: #eef5ff;
        color: #4778e6;
        padding: 7px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .activity-user {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #e9f5ff;
        color: #2457c5;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 8px;
    }
</style>

<div class="mb-4">
    <h4 class="font-weight-bold" style="color:#17243b;">
        <i class="fas fa-history mr-2" style="color:#39c6d8;"></i>
        Riwayat Aktivitas
    </h4>
    <p class="text-muted">
        Catatan aktivitas pengelolaan produk dan kategori.
    </p>
</div>

<div class="activity-card shadow-sm">

    <div class="activity-header">
        <div class="d-flex align-items-center">
            <div class="activity-icon mr-3">
                <i class="fas fa-clock"></i>
            </div>

            <div>
                <h5 class="font-weight-bold mb-1">Activity Log</h5>
                <small style="opacity:0.75;">
                    Riwayat aktivitas terbaru dalam sistem Gadget Store
                </small>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table activity-table mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pengguna</th>
                    <th>Aktivitas</th>
                    <th>Deskripsi</th>
                    <th>Waktu</th>
                </tr>
            </thead>

            <tbody>
                @forelse($activityLogs as $log)
                    <tr>
                        <td>
                            {{ $activityLogs->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <div class="d-flex align-items-center">
                                <span class="activity-user">
                                    <i class="fas fa-user"></i>
                                </span>

                                <span>
                                    {{ $log->user->name ?? 'Pengguna' }}
                                </span>
                            </div>
                        </td>

                        <td>
                            <span class="activity-badge">
                                {{ $log->activity }}
                            </span>
                        </td>

                        <td>
                            {{ $log->description ?? '-' }}
                        </td>

                        <td>
                            <small class="text-muted">
                                {{ $log->created_at->format('d/m/Y H:i') }}
                            </small>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="fas fa-clipboard-list fa-2x text-muted mb-3"></i>
                            <p class="font-weight-bold mb-1">
                                Belum ada aktivitas tercatat
                            </p>
                            <small class="text-muted">
                                Aktivitas produk dan kategori akan muncul di sini.
                            </small>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($activityLogs->hasPages())
        <div class="p-3">
            {{ $activityLogs->links() }}
        </div>
    @endif

</div>

@endsection
