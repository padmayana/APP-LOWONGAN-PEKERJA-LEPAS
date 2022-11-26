@extends('dashboard.navigasi')

@section('konten')
<h1 class="bg-light mb-0 p-4 text-uppercase fw-bold text-center w-100">CEK LOWONGAN </h1>  
<section class="mt-5 ms-3 me-3 w-100">
    <div class="row">
      <div class="col-md-6 gx-5 mb-4">
            <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                <h4><strong class="text-uppercase">{{ $data ->nama }}</strong></h4>
                <p class="text-muted">
                    {{ $data ->deskripsi }}</strong>
                </p>
            </div>
        </div>
        <div class="col-md-6 gx-5 mb-4 text-uppercase text-dark">
            <table>
                <tr>
                    <th class="fw-bold">Pembuat</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">{{ $data ->user-> name }} {{'( ID:'. $data -> user_id.')' }}</th>
                </tr>
                <tr>
                    <th class="fw-bold">skill dicari</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">{{ $data -> bidang -> nama }}</th>
                </tr>
                <tr>
                    <th class="fw-bold">Upah</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">@currency($data -> upah)/{{ $data -> jenis_upah}}</th>
                </tr><tr>
                    <th class="fw-bold">Kuota</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">{{ $data -> kuota }}</th>
                </tr>
                <tr>
                    <th class="fw-bold">Diterima</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">{{ $data -> terima }}</th>
                </tr>
                <tr>
                    <th class="fw-bold">status</th>
                    <th class="fw-light">:</th>
                    <th class="fw-light">{{ $data -> status }}</th>
                </tr>
            </table>
        </div>
        <div class="d-grid gap-2">
            @if ($data -> status == 'menunggu')
                <a class="btn btn-outline-primary rounded-0"  href="/admin/lowongan/iklan/{{ Crypt::encrypt($data ->id) }}">IKLANKAN</a>
                <a class="btn btn-danger rounded-0"  href="/admin/lowongan/tolak/{{ Crypt::encrypt($data ->id) }}">TOLAK</a> 
            @endif
            @if ($data -> status == 'iklan')
                <a class="btn btn-secondary rounded-0"  href="/admin/lowongan/tutup/{{ Crypt::encrypt($data ->id) }}">HENTIKAN IKLAN</a>
            @endif
            @if ($message = Session::get('pesan'))
            <div class="alert alert-warning alert-dismissible fade show w-100 mt-3 me-4 rounded-0" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
            @endif
        </div>
        
    </div>
  </section>
  <!--Section: Content-->

  <hr class="my-5" />

  <!--Section: Content-->
  <section class="text-center">
@endsection