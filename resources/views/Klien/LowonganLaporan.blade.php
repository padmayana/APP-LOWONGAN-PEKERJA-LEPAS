<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <div class="alert bg-primary text-white rounded-0">
            <h3>PEKERJA LEPAS APP</h3>
            <p class="text-white">Didownload pada {{ date("D, d-m-Y") }}</p>
        </div>
        <table border="0">
            <tbody>
                <tr>
                    <td>Nama pembuat</td>
                    <td>: {{ auth()->user()->name }} (ID: KLIEN-0{{ auth()->user()->id }})</td>
                </tr>
                <tr>
                    <td>Dibuat pada</td>
                    <td>: {{ date("D, d-m-Y", strtotime($lowongan->created_at)) }}</td>
                </tr>
                <tr>
                    <td>Status lowongan</td>
                    <td>: {{ $lowongan->status }}</td>
                </tr>
                <tr>
                    <td>Menerima pelamar</td>
                    <td>: {{ $lowongan->kuota }} Orang</td>
                </tr>
                <tr>
                    <td>Penawaran upah</td>
                    <td>: @currency($lowongan->upah) /{{ $lowongan->jenis_upah }}</td>
                </tr>
                <tr>
                    <td>Status lowongan</td>
                    <td>: {{ $lowongan->status }}</td>
                </tr>
                <tr>
                    <td>Layanan</td>
                    <td>: Lowongan</td>
                </tr>
            </tbody>
        </table>
        <p class="text-uppercase bg-dark fw-bold mt-5 h4 pl-2 p-1 text-white">{{ $lowongan->nama }}</p>
        <p>{{ $lowongan->deskripsi }}</p>
        <hr>
        <p><strong><u>* Rincian proses lamaran yang terjadi</u></strong></p>
             <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>Diterima</td>
                        <td>{{ count($terima) }} Pelamar</td>
                    </tr>
                    <tr>
                        <td>Ditolak</td>
                        <td>{{ count($tolak) }} Pelamar</td>
                    </tr>
                    <tr>
                        <td>Total Pelamar</td>
                        <td>{{ count($pelamar) }} Pelamar</td>
                    </tr>
                </tbody>
            </table>  
        <hr>
        <p><strong><u>* Pekerja yang diterima</u></strong></p>
       <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>No. Telp/Hp</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                @if (count($terima) == 0)
                    <tr>
                        <td colspan="3" class="text-center">belum menerima siapapun</td>
                    </tr>   
                @endif
                
                @foreach ($terima as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->notlp }}</td>
                    <td>{{$item->user->email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <p>Hormat kami</p>
                <p class="mt-3">pekerja lepas APP</p>
            </div>
        </div>
          
          <footer class="footer mt-auto py-3">
            <div class="alert alert-secondary">
              <p class="text-dark">Kontak kami</p>
              <p class="text-muted">Tlp: 085738153067</p>
              <p class="text-muted">Email: pekerjaLepasAPP@gmail.com</p>
            </div>
          </footer>
    </div>
</body>

</html>