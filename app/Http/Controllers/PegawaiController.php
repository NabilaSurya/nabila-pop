<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['name']             = "Nabila Surya";
        $data['hobbies']          = ["Membaca", "Menulis", "Mendengarkan Musik", "Traveling", "Fotografi"];
        $data['future_goal']      = "Menjadi Data Scientist";
        $data['tgl_lahir']        = "2005-10-16";
        $data['tgl_harus_wisuda'] = "2025-10-25";
        $data['current_semester'] = 5;

        $lahir   = strtotime($data['tgl_lahir']);
        $today   = strtotime(date("Y-m-d"));
        $selisih = $today - $lahir;

        $tahun = floor($selisih / (365 * 24 * 60 * 60));
        $bulan = floor(($selisih % (365 * 24 * 60 * 60)) / (30 * 24 * 60 * 60));
        $hari  = floor(($selisih % (30 * 24 * 60 * 60)) / (24 * 60 * 60));

        $data['my_age'] = $tahun . " tahun " . $bulan . " bulan " . $hari . " hari";

        $wisuda       = strtotime($data['tgl_harus_wisuda']);
        $diff_wisuda  = $wisuda - $today;
        $hari_tersisa = floor($diff_wisuda / (60 * 60 * 24));

        $data['time_to_study_left'] = $hari_tersisa . " hari";

        if ($data['current_semester'] < 3) {
            $data['pesan'] = "Masih Awal, Kejar TAK";
        } else {
            $data['pesan'] = "Jangan main-main, kurang-kurangi main game!";
        }

        return view('diriku', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
