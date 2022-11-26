<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Level</title>
    <link rel="shortcut icon" href="../pengguna_asset/img/web/logoputih.png" type="image">
    {{-- Bootstrap CSS --}}
  <link href="{{ asset('../bootstrap/CSS/bootstrap.min.css') }}" rel="stylesheet">
  {{-- custom CSS --}}
  <link rel="stylesheet" href="{{ asset('../login_asset/CSS/style.css') }}">
</head>
<body class="background-radial-gradient">
    
<!-- Section: Design Block -->
    <section class=" d-flex align-items-center overflow-hidden " style="  overflow-y: auto; "> 
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" style="height: 100%">
            <div class="row gx-lg-5 align-items-center mb-5 justif justify-content-center">
        
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                {{-- <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div> --}}
        
                    <div class="card bg-glass rounded-0">
                        <div class="card-body px-4 py-5 px-md-5 rounded-0">
                            <h2 class="fw-bold mb-2 text-uppercase">REGISTRASI</h2>
                            <p class="text-black-50 mb-5">PILIH JENIS AKUN ANDA</p>
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-danger w-100 rounded-0 text-uppercase" href="/auth/google/level/{{ Crypt::encrypt('Klien') }}" role="button">Klien</a>
                                </div>
                                <div class="col">
                                    <a class="btn btn-secondary w-100 rounded-0 text-uppercase" href="/auth/google/level/{{ Crypt::encrypt('Freelancer') }}" role="button">Pekerja lepas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    {{-- botstrap JS --}}
    <script src="{{ asset('../bootstrap/JS/bootstrap.bundle.min.js') }}"></script>
</body>
</html>