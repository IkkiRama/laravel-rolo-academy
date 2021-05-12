@extends('layout.main')
@section('title', 'Daftar Guru')
@section('content')

    <div class="panel panel-headline" style="min-height: 70vh;">
        <div class="panel-heading">
            <h2>Data Guru</h2>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px; margin-top: -25px;" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>

            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($guru as $value)
                    <tr>
                        <td><a href="{{url("/guru/profil/$value->id")}}">{{$loop->iteration}}</a></td>
                        <td><a href="{{url("/guru/profil/$value->id")}}">{{$value->nama}}</a></td>
                        <td><a href="{{url("/guru/profil/$value->id")}}">{{$value->jenis_kelamin}}</a></td>
                        <td><a href="{{url("/guru/profil/$value->id")}}">{{$value->agama}}</a></td>
                        <td><a href="{{url("/guru/profil/$value->id")}}">{{$value->alamat}}</a></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                            <form action="{{url("/guru/$value->id")}}" method="post" style="display: inline;">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')"><div class="fa fa-trash"></div></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
