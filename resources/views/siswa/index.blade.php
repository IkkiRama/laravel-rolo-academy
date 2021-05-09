<h2>Data Siswa</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Alamat</th>
    </tr>

    @foreach($siswa as $value)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$value->nama_depan}} {{$value->nama_belakang}}</td>
        <td>{{$value->jenis_kelamin}}</td>
        <td>{{$value->agama}}</td>
        <td>{{$value->alamat}}</td>
    </tr>
    @endforeach
</table>
