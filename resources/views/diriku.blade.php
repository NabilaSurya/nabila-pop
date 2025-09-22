<!DOCTYPE html>
<html>
<head>
    <title>Profil Mahasiswa</title>
</head>
<body>
    <h2>Profil Mahasiswa</h2>
    <p>Nama: {{ $name }}</p>
    <p>Umur: {{ $my_age }}</p>
    <p>Cita-cita: {{ $future_goal }}</p>

    <h4>Hobi:</h4>
    <ul>
        @foreach($hobbies as $hobi)
            <li>{{ $hobi }}</li>
        @endforeach
    </ul>

    <p>Tanggal Harus Wisuda: {{ $tgl_harus_wisuda }}</p>
    <p>Waktu tersisa sampai wisuda: {{ $time_to_study_left }}</p>
    <p>Semester Saat Ini: {{ $current_semester }}</p>
    <p>Pesan: {{ $pesan }}</p>
</body>
</html>
