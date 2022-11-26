<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Hugo 0.98.0">
      {{-- TAB Browser --}}
      <title>Dashboard</title>
      <link rel="shortcut icon" href="{{ URL::asset('../dashboard_asset/navigasi/img/security.png') }}" type="image">
      {{-- Bootstrap CSS --}}
      <link href="{{ URL::asset('../bootstrap/CSS/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('../dashboard_asset/navigasi/CSS/sidebars.css') }}" rel="stylesheet">
      {{-- Custom CSS --}}
      <link href="{{ URL::asset('../dashboard_asset/navigasi/CSS/style.css') }}" rel="stylesheet">
      <link href="{{ URL::asset('../dashboard_asset/home/CSS/style.css') }}" rel="stylesheet">
  </head>
  <body>
    <main class="d-flex flex-nowrap">
      {{-- Side bar --}}
      <div class=" d-flex flex-column flex-shrink-0 p-3 text-white bg-dark mh-100" style="width: 280px; height: 100vh; overflow-y: auto;  ">
        <a href="/admin/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      
      <img src="{{ URL::asset('../dashboard_asset/navigasi/img/security.png') }}" class="bi pe-none me-2" style="width: 32px" alt="" srcset="">
          <span class="fs-5 text-uppercase">data management</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link text-white rounded-0 @if ($menu == "dashboard") active @endif">
              <img src="{{ URL::asset('../dashboard_asset/navigasi/img/homepage.png') }}" class="bi pe-none me-2" style="width: 16px" alt="" srcset="">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/pengguna" class="nav-link text-white rounded-0 @if ($menu == "pengguna") active @endif">
     
              <img src=" {{ URL::asset('../dashboard_asset/navigasi/img/group.png') }}" class="bi pe-none me-2" style="width: 16px" alt="" srcset="">
              Data pengguna
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/bidang" class="nav-link text-white rounded-0 @if ($menu == "bidang") active @endif">
            <img src="{{ URL::asset('../dashboard_asset/navigasi/img/clipboard.png') }}" class="bi pe-none me-2" style="width: 16px" alt="" srcset="">
              Data bidang profesi
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/permintaan" class="nav-link text-white rounded-0 @if ($menu == "permintaan") active @endif">
            <img src="{{ URL::asset('../dashboard_asset/navigasi/img/vacancy (2).png') }}" class="bi pe-none me-2" style="width: 16px" alt="" srcset="">
             Permintaan
            </a>
          </li>
          <li class="nav-item">
            <a href=" /admin/lowongan" class="nav-link text-white rounded-0 @if ($menu == "lowongan") active @endif">
              <img src="{{ URL::asset('../dashboard_asset/navigasi/img/vacancy.png') }}" class="bi pe-none me-2" style="width: 16px" alt="" srcset="">
              Lowongan
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="rounded-circle me-3" 
                  style="background-image: url({{ URL::asset('../storage/'.auth()->user()->image) }}); width: 30px;
                  height: 30px;
                  background-attachment: local ; 
                  background-repeat: no-repeat; 
                  background-size: cover; 
                  background-position: center;">
            </div>
            <div id="icon" class="spinner-grow text-success spinner-grow-sm bi pe-none me-2" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            <strong id="status">Online</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow rounded-0" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item fw-light text-uppercase" href="/admin/dashboard">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/logout" method="POST">
                @csrf
                  <button type="submit" class="dropdown-item text-white text-uppercase fw-light" href="/login">log-out</button>
              </form>
            </li>
          </ul>
        </div>
      </div>



    
    <div class="w-100 d-flex flex-column bg-light justify-content-between" style="height: 100vh">
        {{-- konten dashboard --}}
        <div class="d-flex flex-row justify-content-start flex-wrap align-content-start bg-light" style="overflow-y: scroll; height: 100%;">
          @yield('konten')
        </div>
        {{-- footer --}}
        <div class="text-center p-4 me-4 ms-4" style="background-color: rgba(0, 0, 0, 0.186);">
            © 2022 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">TA_I_KOMANG_DWI_PADMAYANA</a>
        </div>

    </div>
      

    </main>
    {{-- Bootstrap JS --}}
    
    
   

    <script src="{{ URL::asset('../bootstrap/JS/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('../dashboard_asset/navigasi/JS/sidebars.js') }}"></script>
    {{-- Custom JS --}}
    <script src="{{ URL::asset('../dashboard_asset/navigasi/JS/custom.js') }}"></script>
  </body>
</html>
