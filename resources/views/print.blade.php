<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Pengaduan</title>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Tanggal</th>
            <th>Pengaduan</th>
            <th>Gambar</th>
            <th>Status Response</th>
            <th>Pesan Response</th>
        </tr>
        @php $no =1; @endphp
        @foreach ($darahs as $darah)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$darah['nik']}}</td>
            <td>{{$darah['nama']}}</td>
            <td>{{$darah['no_telp']}}</td>
            <td>{{\Carbon\Carbon::parse($darah['created_at'])->format('j, F, Y')}}</td>
            <td>{{$darah ['pengaduan']}}</td>
            <td><img src="assets/image/{{$darah['foto']}}" width="80"></td>
            <td>
                @if ($darah['response'])
                    {{ $darah['response']['status']}}
                @else
                -
                @endif
            </td>
            <td>
                @if ($darah['response'])
                    {{$darah['response']['pesan']}}
                @else
                -
                @endif
            </td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>