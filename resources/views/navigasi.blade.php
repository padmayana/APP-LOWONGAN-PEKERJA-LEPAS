<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="{{ asset('../pengguna_asset/img/web/logoputih.png') }}" type="image">
  <title>Pekerja-lepas</title>
  {{-- Bootstrap CSS --}}
  <link href="{{ asset('../bootstrap/CSS/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('../pengguna_asset/CSS/style.css') }}">
  
  
</head>
<body class="bg-light">
  {{-- navigasi --}}
     <nav class="navbar navbar-expand-lg ps-5 pe-5 fixed-top navbar-dark bg-primary">
      <div class="container ">
        <a class="navbar-brand text-uppercase d-flex flex-row align-items-center fw-bold fs-2" href="/">
          <img src="../pengguna_asset/img/web/logoputih.png" alt="" width="50" class="d-inline-block align-text-top me-1">
          pekerja lepas
        </a>
        <button class="navbar-toggler rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          </ul>
          <span class="navbar-text">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-uppercase fw-light" aria-current="page" href="/">Home</a>
              </li>

              @can('Admin')
                <li class="nav-item">
                  <a class="nav-link text-uppercase fw-light" href="{{ url('admin/dashboard'); }}">Dashboard</a>
                </li>  
              @endcan
              @auth
                  @if ( auth()->user()->level == 'Klien' || auth()->user()->level == 'Freelancer' || auth()->user()->level == 'Admin')
                      @can('Klien')
                      <li class="nav-item">
                        <a class="nav-link text-uppercase fw-light" href="{{ url('/klien/permintaan') }}">Permintaan</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-uppercase fw-light" href="{{ url('klien/lowongan'); }}">Lowongan</a>
                      </li>  
                      @endcan
                      
                      @can('Freelancer')
                        <li class="nav-item">
                          <a class="nav-link text-uppercase fw-light" href="{{ url('/pekerja/permintaan/') }}">Permintaan</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-uppercase fw-light" href="{{ url('pekerja/lowongan'); }}">Lowongan</a>
                        </li>  
                        <li class="nav-item">
                          <a class="nav-link text-uppercase fw-light" href="{{ url('pekerja/lamaran/') }}">Lamaran anda</a>
                        </li>  
                      @endcan
                  @else
                      <li class="nav-item">
                        <a class="nav-link text-uppercase fw-light" href="/auth/google/level">Pilih jenis akun</a>
                      </li> 
                  @endif
              @endauth
              
              
              
              @guest
                <li class="nav-item">
                  <a class="nav-link text-uppercase fw-light" href="{{ url('/login'); }}">Login</a>
                </li>  
              @endguest
              
              @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-uppercase fw-light" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      

                      <div id="icon" class="spinner-grow text-success spinner-grow-sm bi pe-none me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                        <strong id="status" style="display: none">Online</strong>
                      </div>
                    {{ auth()->user()->name }}
                  </a>
                
                   <ul class="dropdown-menu rounded-0" aria-labelledby="navbarScrollingDropdown">
                    @if (auth()->user()->level == 'Klien')
                      <li><a class="dropdown-item text-dark text-uppercase fw-light" href="{{ url('klien/profil'); }}">Profile</a></li>
                    @elseif(auth()->user()->level == 'Freelancer')
                      <li><a class="dropdown-item text-dark text-uppercase fw-light" href="{{ url('pekerja/profil'); }}">Profile</a></li>
                    @endif
                      
                      <li><a class="dropdown-item text-dark text-uppercase fw-light" href="{{ url('#kontak'); }}">kontak</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="/logout" method="POST">
                          @csrf
                            <button type="submit" class="dropdown-item text-dark text-uppercase fw-light" href="{{ url('/logout'); }}">log-out</button>
                        </form>
                      </li>
                    </ul> 
                </li>
              @endauth
            </ul>
          </span>
        </div>
      </div>
    </nav>
    {{-- navigasi --}}
    {{-- konten --}}
    <div class="bg-light pt-5">
        @yield('konten')
    </div>
  {{-- konten --}}
 
  {{-- botstrap JS --}}
  <script src="{{ asset('../bootstrap/JS/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/dashboard_asset/navigasi/JS/custom.js') }}"></script>
</body>
</html>