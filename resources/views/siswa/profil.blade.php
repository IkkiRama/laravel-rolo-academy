@extends('layout.main')
@section('title', 'Profil Siswa')
@section('judul halaman', 'Profil Siswa')
@section('content')
    <div class="panel panel-profile">
        <div class="clearfix">
            <!-- LEFT COLUMN -->
            <div class="profile-left">
                <!-- PROFILE HEADER -->
                <div class="profile-header">
                    <div class="overlay"></div>

                        @if(!$siswa->foto)
                        <div class="profile-main" style="display: flex;align-items: center;justify-content: center;flex-direction: column;">
                            <div class="profil" style="width:50%;height:100px;display:flex; align-items: center; justify-content: center;background-color: #fff;border-radius: 20px;">
                                <i class="fa fa-user" style="color: #000; font-size: 5rem;"></i>
                            </div>

                            <h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        @else

                        <div class="profile-main">
                            <img src="{{asset("images/$siswa->foto")}}" style="width:50%;height:100px;" alt="Avatar">


                            <h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        @endif
                    <div class="profile-stat">
                        <div class="row">
                            <div class="col-md-4 stat-item">
                                {{$siswa->mapel->count()}}<span>Mapel</span>
                            </div>
                            <div class="col-md-4 stat-item">
                                15 <span>Awards</span>
                            </div>
                            <div class="col-md-4 stat-item">
                                2174 <span>Points</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE HEADER -->
                <!-- PROFILE DETAIL -->
                <div class="profile-detail" style="box-shadow: 1px 1px 25px 0 rgba(0,0,0.2,0.1); margin-top:-40px; padding-top:20px; background-color:#fff;">
                    <div class="profile-info">
                        <h4 class="heading">Info Siswa</h4>
                        <ul class="list-unstyled list-justify">
                            <li>Nama Lengkap <span>{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</span></li>
                            <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                            <li>Agama <span>{{$siswa->agama}}</span></li>
                            <li>Alamat <span>{{$siswa->alamat}}</span></li>
                        </ul>
                    </div>
                    <div class="text-center"><a href="{{url("/siswa/edit/$siswa->id")}}" class="btn btn-warning"  style="margin-top:-20px;">Edit Profile</a></div>
                </div>
                <!-- END PROFILE DETAIL -->
            </div>
            <!-- END LEFT COLUMN -->
            <!-- RIGHT COLUMN -->
            <div class="profile-right">

                <!-- TABBED CONTENT -->
                <div class="tab-content">

                    <div class="panel">
                        <div class="panel-heading">
                            {{-- <h3>Mata Pelajaran</h3> --}}
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Mata Pelajaran</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">

                            <button type="button" class="btn btn-primary btn-sm" style="margin-bottom: 10px; margin-top: -25px;" data-toggle="modal" data-target="#exampleModal">Tambah Nilai</button>



                            @if(session('sukses'))
                            <div class="alert alert-success">
                                {{session('sukses')}}
                            </div>
                            @endif

                             @if(session('gagal'))
                            <div class="alert alert-danger">
                                {{session('gagal')}}
                            </div>
                            @endif

                            <div class="tab-pane fade in active" id="tab-bottom-left1">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>KODE</th>
                                            <th>NAMA</th>
                                            <th>SEMESTER</th>
                                            <th>NILAI</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($siswa->mapel as $mapel)
                                        <tr>
                                            <td>{{$mapel->kode}}</td>
                                            <td>{{$mapel->nama}}</td>
                                            <td>{{$mapel->semester}}</td>
                                            <td>{{$mapel->pivot->nilai}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="panel">
                        <div id="chartNilai"></div>
                    </div>

                </div>
                <!-- END TABBED CONTENT -->
            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>




    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog-scrollable  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Nilai</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      <div class="modal-body">
                            <form action="{{url("/siswa/addnilai/$siswa->id")}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for="mapel">Mapel</label>
                                <select name="mapel" id="mapel" class="form-control">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    @foreach($mataPelajaran as $mp)
                                    <option value="{{$mp->id}}">{{$mp->nama}}</option>
                                    @endforeach
                                </select>

                                <div class="form-group @error('nilai') has-error @enderror">
                                    <label for="nilai">Nilai</label>
                                    <input type="number" name="nilai" id="nilai" class="form-control" value="{{old('nilai')}}">

                                    @error('nilai') <div class="invalid-feedback"> {{$message}} </div> @enderror
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection

@section('script')
    <script src="https://code.highcharts.com/highcharts.src.js"></script>

    <script>
        Highcharts.chart('chartNilai', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Laporan Nilai Siswa'
            },
            xAxis: {
                categories: {!!json_encode($kategori)!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Nilai'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Semester Ganjil',
                data: {!!json_encode($data)!!}
            },{
                name: 'Semester Genap',
                data: [42.4, 33.2, 34.5, 49.9, 71.5, 106.4]

            }]
        });
    </script>
@endsection
