<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt Pro Dashboard - @yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Volt Pro Bootstrap 5 Admin Dashboard Template">

    <!-- Start CSS Links (Dipindahkan dari index.blade.php) -->
    @include('layouts.admin.css')
    <!-- End CSS Links -->

    @stack('css') {{-- Untuk CSS tambahan per halaman --}}
</head>

<body>

    <!-- Bagian 1: Sidebar -->
    @include('layouts.admin.sidebar')
    <!-- End Sidebar -->

    <main class="content">

        <!-- Bagian 2: Navbar / Header Atas -->
        @include('layouts.admin.header')
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
        {{-- Pagination --}}
        @if (isset($dataPelanggan) && method_exists($dataPelanggan, 'links'))
            <div class="mt-4">
                {{ $dataPelanggan->links() }}
            </div>
        @elseif(isset($users) && method_exists($users, 'links'))
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        @endif

        </div>
        </div>
        <!-- END: DATA TABLE CARD -->

        <!-- Bagian 4: Footer -->
        @include('layouts.admin.footer')
        <!-- End Footer -->
    </main>

    <!-- Start Javascript -->
    @include('layouts.admin.js')
    <!-- End Javascript -->

</body>

</html>
