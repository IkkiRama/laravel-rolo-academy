<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    public function map($siswa): array
    {
        // This example will return 3 rows.
        // First row will have 2 column, the next 2 will have 1 column
        return [
            [
                $siswa->nama_lengkap(),
                $siswa->jenis_kelamin,
                $siswa->agama,
                totalNilaiSatuSiswa($siswa->id),
                $siswa->rata_rata_nilai()
            ]
        ];
    }



    public function headings(): array
    {
        return [
            'NAMA',
            'JENIS KELAMIN',
            'AGAMA',
            'TOTAL NILAI',
            'RATA-RATA NILAI',
        ];
    }
}
