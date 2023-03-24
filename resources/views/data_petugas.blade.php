<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
    <h2 class="title-table">Laporan Keluhan</h2>
    <div style="display: flex; justify-content: center; margin-bottom: 30px">
        <a href="{{route('logout')}}" style="text-align: center">Logout</a>
        <div style="margin: 0 10px"> | </div>
        <a href="/" style="text-align: center">Home</a>
    </div>

    <div style="display: flex; justify-content: flex-end; align-items: center;">
        <form action="" method="GET">
            @csrf
            {{--menggunakan method GET karna route unutk masuk ke halaman data ini menggunakan ::get--}}
            <input type="text" name="search" placeholder="Cari berdasarkan nama...">
            <button type="submit" class="btn-login" style="margin-top: -1px">Cari</button>
        </form>
        {{-- refresh balik lagi ke route data karna nanti pas di kluk refresh mau bersihin riwayat pencarian 
             sebelumnya dan balikin lagi nya ke halaman data lagi--}}
        <a href="{{route('data')}}" class="btn-login" style="margin-left: 10px; margin-top: -2px">Refresh</a>
    </div>
    <div style="padding: 0 30px">
        <table>
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Telp</th>
                    <th>Pengaduan</th>
                    <th>Gambar</th>
                    <th>Status Response</th>
                    <th>Pesan Response</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($darahs as $darah)
                <tr>
                    {{--menambahkan angka 1 dari $no di php tiap baris nya--}}
                    <td>{{$no++}}</td>
                    <td>{{$darah ['nik']}}</td>
                    <td>{{$darah ['nama']}}</td>
                    <td>{{$darah ['no_telp']}}</td>
                    <td>{{$darah ['pengaduan']}}</td>
                    <td>
                        <img src="{{asset('assets/image/'.$darah->foto)}}" width="120">
                    </td>
                    <td>
                        {{--cek apakah data report ini sudah memiliki relasi dengan data dr with('response')--}}
                        @if ($darah->response)
                        {{--kalau ada hasil relansinya, ditampilkan bagian status--}}
                            {{ $darah->response['status']}}
                        @else
                        {{--kalo gak ada tampilkan tanda ini--}}
                        -
                        @endif
                    </td>
                    <td>
                        {{--cek apakah data report ini sudah memiliki relasi dengan data dr with('response')--}}
                        @if ($darah->response)
                        {{--kalau ada hasil relansinya, ditampilkan bagian pesan--}}
                            {{$darah->response['pesan']}}
                        @else
                        {{--kalo gak ada tampilkan tanda ini--}}
                        -
                        @endif
                    </td>
                    <td style="display: flex; justify-content: center;">
                        {{--kirim data id dari foreach report ke path dinamis punya nya route response.edit--}}
                        <a href="{{route('response.edit', $darah->id)}}" class="back-btn">Send Response</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>