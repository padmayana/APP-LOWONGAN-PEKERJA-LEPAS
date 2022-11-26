@extends('navigasi')
@section('konten')
<!-- slider -->
    <div id="carouselExampleControls" class="carousel slide mati" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">

          <div class="slide-gradient w-100">
            <img src="/pengguna_asset/img/web/slide1.png" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" style="height: 100vh;" width="800" height="400"  role="img" aria-label="Placeholder: First slide" fill="#666" alt="">
          </div>
          <div class="carousel-caption d-none d-md-block h-50">
              <h1 class="text-start text-uppercase fw-bold">Welcome</h1>
              <p class="text-start fs-4 w-50">Selamat anda sedang mengakses aplikasi pekerja lepas di bidang teknologi informasi, buat  akun sekarang juga atau melakukan login untuk bisa menikmati fitur kami</p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-gradient w-100">
            <img src="/pengguna_asset/img/web/slide2.png" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" style="height: 100vh;" width="800" height="400"  role="img" aria-label="Placeholder: First slide" fill="#666" alt="">
          </div>
          <div class="carousel-caption d-none d-md-block h-50">
              <h1 class="text-center text-uppercase fw-bold">Login atau daftar sebagai pekerja</h1>
              <div class="d-flex w-100 justify-content-center align-items-center">
                  <p class="text-center fs-4 ps-5 pe-5 w-50">Anda bisa masuk menggunakan akun pekerja untuk mendapatkan fitur khusus pekerja lepas</p>
              </div> 
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-gradient w-100">
            <img src="/pengguna_asset/img/web/slide3.png" class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" style="height: 100vh;" width="800" height="400"  role="img" aria-label="Placeholder: First slide" fill="#666" alt="">
          </div>
          <div class="carousel-caption d-none d-md-block h-50 d-flex">
            <h1 class="text-end text-uppercase fw-bold">Login atau daftar sebagai klien</h1>
            <div class="d-flex w-100 justify-content-end align-items-end">
              <p class="text-end fs-4 w-50">Anda bisa masuk menggunakan akun klien untuk mendapatkan fitur khusus klien</p>
            </div>
            
          </div>
        </div>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center mb-5 kenapa">
      <h3 class="w-75 text-uppercase fw-bold text-center mt-5">Kenapa aplikasi ini ada?</h3>
      <P class="w-75 fs-4 text-center mb-5">Aplikasi ini ada untuk membatu orang-orang yang berprofesi sebagai pekerja lepas di bidang teknologi dengan cara memberikan
                                        informasi mengenaii lowongan yang sedang dibuka dan juga mendapatkan permintaan mengerjakan suatu pekerjaan. namun tidak sampai disitu saja kami juga memberikan kemudahan untu klien 
                                        untuk membuat iklan lowongan dan juga membuat permintaan kepada pekerja lepas sesuai bidang keahlian yang di sediakan oleh aplikasi.

      </P>
    </div>
    <hr>
    <!-- Image Showcases-->
    <h3 class="w-100 text-uppercase fw-bold text-center mt-5 pb-5">fitur-fitur aplikasi</h3>
    <section class="container-fluid">

      <div class="container-fluid p-0">
          <div class="row g-0">
              <div class="col-lg-6 order-lg-2 text-white showcase" style="background-image: url('/pengguna_asset/img/web/1.png')"></div>
              <div class="col-lg-6 order-lg-1 my-auto " style="padding-top:150px; padding-bottom: 150px; padding-left:50px  ">
                  <h2>Melamar</h2>
                  <p class="lead mb-0">Anda bisa melakukan proses melamar pada lowongan yang di iklankan, ayo login sekarang</p>
              </div>
          </div>
          <div class="row g-0">
              <div class="col-lg-6 text-white showcase" style="background-image: url('/pengguna_asset/img/web/2.png')"></div>
              <div class="col-lg-6 my-auto " style="padding-top:150px; padding-bottom: 150px; padding-left:50px  ">
                  <h2>Permintaan</h2>
                  <p class="lead mb-0">Klien bisa melakukan proses permintaan kepada pekerja yang terdaftar, ayo login sekarang</p>
              </div>
          </div>
          <div class="row g-0">
              <div class="col-lg-6 order-lg-2 text-white showcase" style="background-image: url('/pengguna_asset/img/web/3.png')"></div>
              <div class="col-lg-6 order-lg-1 my-auto" style="padding-top:150px; padding-bottom: 150px; padding-left:50px  ">
                  <h2>Mengiklankan</h2>
                  <p class="lead mb-0">Kami bisa mengiklankan lowongan yang anda buat pada aplikasi ini, ayo login sekarang</p>
              </div>
          </div>
      </div>
    </section>
    <hr class="">
    <div class="container-fluid d-flex flex-column align-items-center bg-light mt-5">
      <h3 class="w-75 text-uppercase fw-bold text-center mt-5">Bidang profesi yang tersedia</h3>
      <div class="container-fluid w-75 mb-5 d-flex mt-5 flex-row justify-content-center flex-wrap">
        @if ($bidang)
           @foreach ($bidang as $item)
                <a href="#"><span class="badge rounded-pill text-bg-primary fs-5 m-3">{{ $item->nama }}</span></a> 
            @endforeach 
        @endif
        
      </div>
    </div>
    
    @include('footer')
@endsection
