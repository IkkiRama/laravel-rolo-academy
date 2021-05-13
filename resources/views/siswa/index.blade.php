@extends('layout.main')
@section('title', 'Daftar Siswa')
@section('content')

    <div class="panel panel-headline" style="min-height: 70vh;">
        <div class="panel-heading">
            <h2>Data Siswa</h2>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px; margin-top: -25px;" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>

            <button type="button" class="btn btn-danger btn-sm float-right" style="margin-bottom: 10px; margin-top: -25px;" data-toggle="modal" data-target="#downloadModal">Download Data</button>




            {{-- @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif --}}

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
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->nama_lengkap()}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->jenis_kelamin}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->agama}}</a></td>
                        <td><a href="{{url("/siswa/profil/$value->id")}}">{{$value->alamat}}</a></td>
                        <td>
                            <a href="{{url("/siswa/edit/$value->id")}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                            <a href="#" class="btn btn-danger btn-sm hapusSiswa" siswa-id="{{$value->id}}"><div class="fa fa-trash"></div></a>
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
                                <div class="form-group @error('nama_depan') has-error @enderror">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="{{old('nama_depan')}}">

                                    @error('nama_depan') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="{{old('nama_belakang')}}">
                                </div>

                                <div class="form-group @error('email') has-error @enderror">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">

                                    @error('email') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>

                                <div class="form-group @error('jenis_kelamin') has-error @enderror">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">Pilih Jenis Kelamin</option>

                                        <option value="Laki-laki"{{(old('jenis_kelamin') == 'Laki-laki') ? ' selected' : ''}}>Laki-laki</option>


                                        <option value="Perempuan"{{(old('jenis_kelamin') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
                                    </select>


                                    @error('jenis_kelamin') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>


                                <div class="form-group @error('agama') has-error @enderror">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" id="agama" class="form-control" value="{{old('agama')}}">

                                    @error('agama') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>

                                <div class="form-group @error('foto') has-error @enderror">
                                    <label for="foto">Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-form-control" value="{{old('foto')}}">

                                    @error('foto') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>

                                <div class="form-group @error('alamat') has-error @enderror">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{old('alamat')}}</textarea>

                                    @error('alamat') <div class="invalid-feedback"> {{$message}} </div> @enderror
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

            <!-- Modal -->
            <div class="modal fade" id="downloadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih File Download</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="width:100%;display:flex;justify-content:center;">
                                <a href="{{url('/siswa/export')}}" class="btn btn-primary" style="margin-right:30px;">File Excel</a>
                                <a href="" class="btn btn-danger">File PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>

        @if(Session::has('sukses'))
            swal("Sukses!", "{{Session::get('sukses')}}", "success");
        @endif

        $('.hapusSiswa').click(function(){
            let siswa_id = $(this).attr('siswa-id');
            swal({
                title: "Yakin?",
                text: "Anda Akan Menghapus Data Ini ??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/siswa/delete/"+siswa_id
            }
            });
        });


    </script>
@endsection
