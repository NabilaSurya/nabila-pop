<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt Pro Dashboard - @yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Volt Pro Bootstrap 5 Admin Dashboard Template">

    <!-- Start CSS Links (Dipindahkan dari index.blade.php) -->
    @include('layouts.admin.css');
    <!-- End CSS Links -->

    @stack('css') {{-- Untuk CSS tambahan per halaman --}}

</head>

<body>

    <!-- Bagian 1: Sidebar -->
    @include('layouts.admin.sidebar');
    <!-- End Sidebar -->


    <main class="content">

        <!-- Bagian 2: Navbar / Header Atas -->
        @include('layouts.admin.header');
        <!-- End Navbar -->


        {{-- Bagian 3: Konten Unik Setiap Halaman --}}
        @yield('content')
        {{-- End Content --}}

        <!-- Tampilkan Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- START: DATA TABLE CARD (Bagian Kunci untuk Menampilkan Data) -->
        <div class="card card-border-0 shadow mb-4">
            <div class="card-body">

                <div class="mb-4">
                    <input type="text" class="form-control"
                        placeholder="Cari pelanggan berdasarkan nama atau email...">
                </div>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-light">
                            <tr>
                                <th class="border-0">Nama user</th>
                                <th class="border-0">Email</th>
                                <th class="border-0">Password</th>
                                <th class="border-0 rounded-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPelanggan as $item)
                                <tr>
                                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>Tombol Edit & Tombol Hapus</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                @if (isset($pelanggans) && method_exists($pelanggans, 'links'))
                    <div class="mt-4">
                        {{ $pelanggans->links() }}
                    </div>
                @endif

            </div>
        </div>
        <!-- END: DATA TABLE CARD -->

        {{-- MODAL HAPUS (Diulang untuk setiap pelanggan) --}}
        {{-- Blok ini harus ditutup dengan @endif sebelum @endsection --}}
        @if (isset($pelanggans))
            @foreach ($pelanggans as $pelanggan)
                <div class="modal fade" id="modal-delete-{{ $pelanggan->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-delete-{{ $pelanggan->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Konfirmasi Hapus</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{-- Menggunakan first_name dan last_name di modal --}}
                                <p>Apakah Anda yakin ingin menghapus data pelanggan **{{ $pelanggan->first_name }}
                                    {{ $pelanggan->last_name }}**?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                </form>
                                <button type="button" class="btn btn-link text-gray-600 ms-auto"
                                    data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif {{-- PENTING: Penutup @endif yang benar harus ada di sini, tanpa baris kosong di bawahnya (kecuali @endsection) --}}


        <!-- Bagian 4: Footer -->
        @include('layouts.admin.footer')
        <!-- End Footer -->
    </main>

    <!-- Start Javascript -->
    <!-- Sweet Alerts 2 -->
    @include('layouts.admin.js');
    <!-- End Javascript -->

</body>

</html>
