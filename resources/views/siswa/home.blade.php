@extends('layout.main')
@section('title', 'Home')
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h2>Selamat Datang Di Aplikasi Kami</h2>
        </div>

        <div class="panel-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{totalSiswa()}}</span>
                            <span class="title">Total Siswa</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{totalGuru()}}</span>
                            <span class="title">Total Guru</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-body">
                    <h3>Ranking 5 Besar</h3>
                    <div class="tab-pane fade in active" id="tab-bottom-left1">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>RANKING</th>
                                    <th>NAMA</th>
                                    <th>RATA-RATA NILAI</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(limaBesar() as $value)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$value->nama_lengkap()}}</td>
                                    <td>{{$value->rataRataNilai}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
