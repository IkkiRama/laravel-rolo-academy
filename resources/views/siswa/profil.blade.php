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
                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                    <ul class="nav" role="tablist">
                        <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Aktivitas Terakhir</a></li>
                    </ul>
                </div>
                <div class="tab-content">
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
                <!-- END TABBED CONTENT -->
            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>
@endsection
