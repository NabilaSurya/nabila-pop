@extends('layouts.admin.app')

@section('content')
    <!-- Start Main Content Header -->
    <div class="py-4">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
            </ol>
        </nav>

        {{-- Page Title --}}
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Pelanggan</h1>
                <p class="mb-0">List data seluruh pelanggan.</p>
            </div>

            {{-- FILTER + SEARCH + BUTTON --}}
            <div class="d-flex align-items-center">

                {{-- FORM FILTER + SEARCH --}}
                <form action="{{ route('pelanggan.index') }}" method="GET" class="d-flex me-2">

                    {{-- FILTER GENDER --}}
                    <select name="gender" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                        <option value="">All</option>
                        <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>

                    {{-- SEARCH --}}
                    <div class="input-group">

                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search..."
                            value="{{ request('search') }}">

                        <button type="submit" class="input-group-text">
                            <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        {{-- CLEAR SEARCH --}}
                        @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="btn btn-outline-secondary btn-sm ms-2" id="clear-search">
                                Clear
                            </a>
                        @endif

                    </div>

                </form>

                {{-- BUTTON TAMBAH --}}
                <a href="{{ route('pelanggan.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus me-1"></i> Tambah Pelanggan
                </a>

            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $dataPelanggan->links('pagination::bootstrap-5') }}
        </div>
    </div>
    <!-- End Main Content Header -->
@endsection
