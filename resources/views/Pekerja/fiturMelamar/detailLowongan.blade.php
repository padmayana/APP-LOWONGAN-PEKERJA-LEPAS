@extends('navigasi')
@section('konten')
<section>
    <div class="container py-5">
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                <div class="rounded-circle bg-dark d-felx m-auto" style="padding: 25%; 
                width: 25%; 
                height: 25%; 
                background-image: url('../../../storage/{{ $data->user->image }}'); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: top">
                </div>
              <h5 class="my-3">{{ $data->user->name }}</h5>
              <p class="mb-1 badge bg-primary text-white rounded-0 text-uppercase">{{ $data->user->level }}</p>
              <p class="text-muted mb-4">(Pembuat lowongan)</p>
              <div class="d-flex justify-content-center mb-2">
                @if (isset($lamaran))
                  @if ($lamaran->status == 'Menunggu')
                      <a href="{{ url('/pekerja/batal/'.Crypt::encrypt($data->id)) }}" class="btn btn-danger rounded-0">Batalkan</a>
                  @endif
                @else
                    <a href="{{ url('/pekerja/melamar/'.Crypt::encrypt($data->id)) }}" class="btn btn-primary rounded-0">Melamar</a>
                @endif
              </div>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                  <p class="mb-0">KONTAK</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-check-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 4.697v4.974A4.491 4.491 0 0 0 12.5 8a4.49 4.49 0 0 0-1.965.45l-.338-.207L16 4.697Z"/>
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                      </svg>
                  <p class="mb-0">{{ $data->user->email }}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                  <p class="mb-0">{{ $data->user->notlp }}</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Membutuhkan</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">Kemampuan di {{ $data->bidang->nama }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Lokasi pekerjaan</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                      </svg>
                    {{ $data->daerah->nama }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Upah</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">@currency($data->upah) /<span class="small text-danger">{{ $data->jenis_upah }}</span></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Menerima</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">"{{ $data->kuota }}" orang, saat ini "{{ $data->terima }}" telah di terima</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat klien</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data->user->daerah }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <h4 class="mb-4"><span class="text-primary fw-bold me-1 text-uppercase">{{ $data->nama }}</span></h4>
                  <p class="mb-1">{{ $data->deskripsi }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection