<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $siswa = Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $siswa =Siswa::all();
        }
        return view('siswa.index', compact('siswa'));
    }



    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect('/siswa')->with('status', 'Data Berhasil Ditambahkan');
    }




    public function show(Siswa $siswa)
    {
        //
    }





    public function edit(Siswa $siswa)
    {
        return view('siswa.ubah', compact('siswa'));
    }



    public function update(Request $request, Siswa $siswa)
    {
        // Siswa::where('id', $siswa->id)
        //     ->update([
        //         'nama_depan' => $request->nama_depan,
        //         'nama_belakang' => $request->nama_belakang,
        //         'jenis_kelamin' => $request->jenis_kelamin,
        //         'agama' => $request->agama,
        //         'alamat' => $request->alamat
        //     ]);


        $id = Siswa::find($siswa->id);
        $id->update($request->all());

        return redirect('/siswa')->with('status', 'Data Berhasil Diubah');
    }



    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);

        return redirect('/siswa')->with('status', 'Data Berhasil Dihapus');
    }
}
