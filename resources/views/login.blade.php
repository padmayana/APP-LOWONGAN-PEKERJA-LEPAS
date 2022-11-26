<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../pengguna_asset/img/web/logoputih.png" type="image">
    <title>Login</title>
    {{-- Bootstrap CSS --}}
  <link href="../bootstrap/CSS/bootstrap.min.css" rel="stylesheet">
  {{-- custom CSS --}}
  <link rel="stylesheet" href="../login_asset/CSS/style.css">
</head>
<body class="background-radial-gradient">
    
<!-- Section: Design Block -->
    <section class="d-flex align-items-center overflow-hidden my-auto" style="overflow-y: auto; "> 
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Cari pekerjaan lepas <br />
                        <span style="color: hsl(231, 64%, 58%)">Mencari pekerja lepas</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Daftar atau LogIn sekarang juga untuk mendapatkan layanan 
                        pencarian kerja atau pekerja kami!
                    </p>
                </div>
        
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                {{-- <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div> --}}
        
                    <div class="card bg-glass rounded-0">
                        <div class="card-body px-4 py-5 px-md-5 rounded-0">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-black-50 mb-5">Please enter your login and password!</p>
                            <form action="/login" method="POST">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="form3Example3" class="form-control rounded-0 @error('email') is-invalid @enderror" placeholder="Masukan Email" autofocus required>
                                </div>
                
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" id="form3Example4" class="form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Masukan Password">
                                </div>
                
                                <!-- Checkbox -->

                
                                <!-- Submit button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary rounded-0" type="submit">LOGIN</button>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a class="btn btn-danger rounded-0" href="{{ url('auth/redirect') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                      </svg> Google Akun</a>
                                </div>
                
                                <!-- Register buttons -->
                                <hr>
                                <div class="text-center mt-3">
                                <p><a href="/reset/email">lupa password</a> atau <a href="/reglevel">daftar</a></p>
                                </div>
                            </form>
                            @if ($message = Session::get('sukses'))
                                <div class="alert alert-success alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
                                    <strong>{{$message}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>  
                             @endif
                             @if ($message = Session::get('gagal'))
                                <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
                                    <strong>{{$message}}</strong>
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