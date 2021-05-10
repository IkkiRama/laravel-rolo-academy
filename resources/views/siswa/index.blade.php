@extends('layout.main')
@section('title', 'Daftar Siswa')
@section('content')

    <div class="panel panel-headline" style="min-height: 70vh;">
        <div class="panel-heading">
            <h2>Data Siswa</h2>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px; margin-top: -25px;" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>

            @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

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
                    @foreach($siswa as $value)
                    <tr>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$loop->iteration}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->nama_depan}} {{$value->nama_belakang}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->jenis_kelamin}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->agama}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->alamat}}</a></td>
                        <td>
                            <a href="{{url("/siswa/edit/$value->id")}}" class="btn btn-warning btn-sm">Ubah</a>

                            <form action="{{url("/siswa/$value->id")}}" method="post" style="display: inline;">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('/siswa')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" name="nama_depan" id="nama_depan" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" id="agama" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-form-control-file">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Tambah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
