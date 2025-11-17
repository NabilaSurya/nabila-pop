@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        {{-- Page Title and Action Button --}}
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data User</h1>
                <p class="mb-0">List data seluruh user.</p>
            </div>

            {{-- Bagian tombol Tambah User --}}
            <div>
                <a href="{{ route('user.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah User
                </a>
            </div>
        </div>
    </div>

    {{-- - START: FORM FILTER DAN SEARCH (Gaya Row/Col) - --}}
    <form method="GET" action="{{ route('user.index') }}" class="mb-3">
        <div class="row align-items-center">

            {{-- Kolom untuk Search Input --}}
            <div class="col-md-4 col-sm-6 mb-2">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama..."
                        value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>

            {{-- Kolom untuk Reset Button (Jika ada pencarian aktif) --}}
            @if (request('search'))
                <div class="col-md-2 col-sm-6 mb-2">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
                        Reset Filter
                    </a>
                </div>
            @endif

            {{-- Anda bisa menambahkan filter SELECT lain di kolom berikutnya di sini (misalnya filter role) --}}
            {{-- Contoh Filter Role:
            <div class="col-md-3 col-sm-6 mb-2">
                <select name="role" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Role</option>
                    <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Staff" {{ request('role') == 'Staff' ? 'selected' : '' }}>Staff</option>
                </select>
            </div>
            --}}

        </div>
    </form>
    {{-- - END: FORM FILTER DAN SEARCH - --}}

    {{-- START PAGINASI ATAS --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        @if ($dataUser->total() > 0)
            <div class="fw-normal small">
                Menampilkan {{ $dataUser->firstItem() }} hingga {{ $dataUser->lastItem() }} dari total
                {{ $dataUser->total() }} data
            </div>
        @else
            <div class="fw-normal small">
                Tidak ada data user.
            </div>
        @endif

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
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">NAMA</th>
                    <th class="border-gray-200">EMAIL</th>
                    <th class="border-gray-200">TELEPON</th>
                    <th class="border-gray-200">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataUser as $index => $user)
                    <tr>
                        <td>{{ $dataUser->firstItem() + $index }}</td>
                        <td><span class="fw-normal">{{ $user->name }}</span></td>
                        <td><span class="fw-normal">{{ $user->email }}</span></td>
                        <td><span class="fw-normal">{{ $user->telepon ?? '-' }}</span></td>
                        <td>
                            {{-- Tombol Aksi --}}
                            <div class="btn-group">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-info me-2">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data user yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
