<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Volt Pro Dashboard - @yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Volt Pro Bootstrap 5 Admin Dashboard Template">

    @include('layouts.admin.css')
    @stack('css') {{-- Untuk CSS tambahan per halaman --}}
</head>

<body>

    @include('layouts.admin.sidebar')
    <main class="content">

        @include('layouts.admin.header')
        {{-- Tampilkan Notifikasi Sukses --}}
        @if (session('success'))
            {{-- Pastikan div alert diletakkan di dalam main atau content wrapper --}}
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Bagian 3: Konten Unik Setiap Halaman --}}
        @yield('content')
        {{-- End Content --}}

        {{--
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
        --}}

        @include('layouts.admin.footer')
    </main>

    @include('layouts.admin.js')
</body>

</html>
