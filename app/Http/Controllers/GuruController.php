<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;

class GuruController extends Controller
{
    public function index()
    {

        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }


    public function profil(Guru $guru)
    {
        return view('guru.profil', compact('guru'));
    }
}
