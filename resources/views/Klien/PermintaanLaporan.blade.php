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
        <h3 class="alert bg-primary text-white" style="font-family: Arial, Helvetica, sans-serif">LAPORAN PERMINTAAN ANDA</h3>
        <table border="0">
            <tbody>
                <tr>
                    <td>Nama pengguna</td>
                    <td>: {{ auth()->user()->name }} (ID: KLIEN-0{{ auth()->user()->id }})</td>
                </tr>
                <tr>
                    <td>Dibuat pada</td>
                    <td>: {{ date("d-m-Y") }}</td>
                </tr>
                <tr>
                    <td>Layanan</td>
                    <td>: Permintaan</td>
                </tr>
            </tbody>
        </table>
        <p>
            Selama anda melakukan permintaan dalam aplikasi pekerja lepas, kami telah membaut rangkuman mengenai permintaan anda. Berikut rincianya:
        </p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Status permintaan</th>
                    <th scope="col">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Diterima</td>
                    <td>{{ count($terima) }}</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Ditolak</td>
                    <td>{{ count($tolak) }}</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Menunggu</td>
                    <td>{{ count($menunggu) }}</td>
                </tr>
            </tbody>
        </table>
        @if (count($tolak) > count($terima))
            <p><u>Menurut kami, anda perlu membuat penawaran anda lebih menarik</u></p>
        @else
            <p><u>Menurut kami, sejauh ini masih baik</u></p>
        @endif
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