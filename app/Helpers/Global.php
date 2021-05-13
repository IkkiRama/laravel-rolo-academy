<?php

use \App\Models\Siswa;
use \App\Models\Guru;

function limaBesar()
{
    $siswa = Siswa::all();
    $siswa->map(function($satuSiswa){
        $satuSiswa->rataRataNilai = $satuSiswa->rata_rata_nilai();
        return $satuSiswa;
    });
    $siswa = $siswa->sortByDesc('rataRataNilai')->take(5);


    return $siswa;
}


function totalNilaiSatuSiswa($id)
{
    $total = 0;
    $siswa = Siswa::find($id);
    foreach($siswa->mapel as $mapel) {
        $total = $total + $mapel->pivot->nilai;
    }

    return $total;
}








function totalSiswa()
{
    return Siswa::count();
}


function totalGuru()
{
    return Guru::count();
}

?>
