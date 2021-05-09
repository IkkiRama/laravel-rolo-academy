<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function index()
    {
        $siswa =Siswa::all();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
