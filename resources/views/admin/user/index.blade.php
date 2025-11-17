@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        {{-- Breadcrumb --}}
        {{-- Page Title and Action Button --}}
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data User</h1>
                <p class="mb-0">List data seluruh user.</p>
            </div>
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah User
                </a>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="fw-normal small">
            Menampilkan {{ $dataUser->firstItem() }} hingga {{ $dataUser->lastItem() }} dari total {{ $dataUser->total() }}
            data
        </div>
        <div class="d-flex align-items-center">
            {{ $dataUser->links('pagination::bootstrap-5') }}
        </div>
    </div>
    {{-- END PAGINASI ATAS --}}

    {{-- Tabel Data User --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">NAMA</th>
                    <th class="border-gray-200">EMAIL</th>
                    <th class="border-gray-200">TELEPON</th>
                    <th class="border-gray-200">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @if ($dataUser->count() > 0)
                    @foreach ($dataUser as $user)
                        <tr>
                            <td>
                                <span class="fw-normal">{{ $user->name }}</span>
                            </td>
                            <td><span class="fw-normal">{{ $user->email }}</span></td>
                            {{-- Ganti 'telepon' jika nama kolom di DB berbeda --}}
                            <td><span class="fw-normal">{{ $user->telepon ?? '-' }}</span></td>
                            <td>
                                {{-- Tombol Aksi --}}
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-info me-2">Edit</a>
                                    <form action="#" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>

        {{-- Footer Tabel & Paginasi (Bagian ini kini hanya berisi Copyright) --}}
        <div
            class="card-footer px-3 border-0 d-flex flex-lg-row flex-column flex-wrap flex-xl-nowrap align-items-center justify-content-between">

            {{-- CATATAN: Paginasi lama dihapus dari sini --}}

            {{-- Teks Copyright/Footer --}}
            <div class="fw-normal small">
                © 2019-2025 Aplikasi Pelanggan
            </div>
            <div class="text-end">
                Hubungi Admin
            </div>
        </div>

    </div>


@endsection
