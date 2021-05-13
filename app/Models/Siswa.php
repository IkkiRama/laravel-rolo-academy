<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable = ['nama_depan', 'nama_belakang', 'agama', 'jenis_kelamin', 'alamat', 'foto', 'id_user'];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rata_rata_nilai()
    {
        // ambil nilai2
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel) {
            $total = $total + $mapel->pivot->nilai;
            $hitung++;
        }

        return round($total/$hitung);
    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
}
