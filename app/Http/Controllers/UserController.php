<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // 👈 1. Terima objek Request
    {
        // Memulai query builder untuk Model User
        $query = User::query();

        // 2. IMPLEMENTASI FILTER (ROLE)
        // Asumsi: Kolom 'role' ada di tabel users
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        // 3. IMPLEMENTASI PENCARIAN (SEARCH)
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';

            // Mencari di kolom 'name' atau 'email'
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm)
                    ->orWhere('email', 'like', $searchTerm);
                // Jika ada kolom 'telepon'
                // ->orWhere('telepon', 'like', $searchTerm);
            });
        }

        // 4. PAGINATION
        $dataUser = $query->paginate(10)->withQueryString(); // Gunakan withQueryString() untuk mempertahankan filter/search

        $data['dataUser'] = $dataUser;

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 5. VALIDASI (Sangat direkomendasikan)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Gunakan 'confirmed' jika ada input password_confirmation
            // Tambahkan validasi untuk 'role' dan 'telepon' jika ada di form:
            // 'role' => 'nullable|in:admin,staff,user',
            // 'telepon' => 'nullable|string|max:20',
        ]);

        // Mengambil semua input kecuali token dan konfirmasi password
        $data = $request->except('_token', 'password_confirmation', 'password_konfirmation');

        $data['password'] = Hash::make($request->password);

        // Asumsi Anda menggunakan kolom 'role' dan 'telepon' di form dan tabel Anda
        // Jika tidak ada di form, hapus baris ini

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
