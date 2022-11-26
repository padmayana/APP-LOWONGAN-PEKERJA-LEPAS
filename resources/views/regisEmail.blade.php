<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="shortcut icon" href="../pengguna_asset/img/web/logoputih.png" type="image">
    {{-- Bootstrap CSS --}}
  <link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
  {{-- custom CSS --}}
  <link rel="stylesheet" href="../login_asset/CSS/style.css">
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
                            <p class="text-black-50 mb-5">KONFIRMASI EMAIL ANDA SEBELUM MENDAFTAR</p>
                            <form class="row g-3" method="POST" action="/regemail/{{ $level }}">
                                @csrf
                                @method('PUT')
                                
                
                                <div class="form-outline mb-4">
                                    <label for="Email" class="form-label">Email</label>
                                    <input type="email" name="email" id="Email" class="form-control rounded-0 @error('email') is-invalid @enderror" placeholder="Masukan Email" value="{{ request('email') }}">
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary rounded-0" type="submit">KONFIRMASI</button>
                                </div>
                
                                <!-- Register buttons -->
                                <div class="text-center">
                                <p>atau sudah terdaftar <a href="/">login</a></p>
                                </div>
                            </form>
                            @if ($message = Session::get('pesan'))
                            <div class="alert alert-warning alert-dismissible fade show w-100 mt-3 me-4 rounded-0" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>  
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    {{-- botstrap JS --}}
    <script src="../bootstrap/JS/bootstrap.bundle.min.js"></script>
</body>
</html>