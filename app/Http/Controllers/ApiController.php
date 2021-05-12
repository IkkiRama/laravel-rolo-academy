<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class ApiController extends Controller
{
    public function edit_nilai(Request $request, Siswa $siswa)
    {
        $siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
};
