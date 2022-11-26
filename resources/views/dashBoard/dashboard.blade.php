@extends('dashboard.navigasi')

@section('konten')

<div class="bck w-100 d-flex align-items-end justify-content-between" style="height: 35vh">
  <h1 class="bg-light mb-0 p-3" style="width: fit-content">
      DASHBOARD
      <!-- Button trigger modal -->
      <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"><img src="../dashboard_asset/navigasi/img/question-mark.png" class="bi pe-none me-2" style="width: 32px" alt="" srcset=""></a>
  </h1>  
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down">
      <div class="modal-content rounded-0">
        <div class="modal-header bg-dark rounded-0">
          <h5 class="modal-title h4 text-light" id="exampleModalFullscreenLabel">Dimana ini?</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Saat ini anda berada di dashboard dimana memiliki fungsi sebegai tempat manajemen data.
        </div>
        <div class="modal-footer border-opacity-10">
          <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">Saya paham!</button>
        </div>
      </div>
    </div>
</div>
{{--  --}}

{{-- Profile --}}


  <div class="w-100 p-4 bg-light">

    <div class="row">

      <div class="col-lg-4 rounded-0">
        <div class="card mb-4 rounded-0">
          <div class="card-body text-center">
            <div class="rounded-circle bg-dark d-felx m-auto" style="padding: 25%; 
                  width: 25%; 
                  height: 25%; 
                  background-image: url('../storage/{{ auth()->user()->image }}'); 
                  background-attachment: local ; b
                  ackground-repeat: 
                  no-repeat; 
                  background-size: cover; 
                  background-position: center">
            </div>
            
            <h5 class="my-3">{{ auth()->user()->name }}</h5>
            <p class="text-muted mb-1"> <span class="badge text-bg-primary rounded-0 text-uppercase">{{ auth()->user()->level }}</span></p>
            <p class="text-muted mb-4">Anda login menggunakan akun ini</p>
            <div class="d-flex justify-content-center mb-2">
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-8 ">
        <div class="card mb-4 rounded-0 ">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ auth()->user()->notlp }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0 text-capitalize">{{ auth()->user()->daerah }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <button type="button" class="btn btn-success rounded-0 me-2" role="button" data-bs-toggle="modal" data-bs-target="#foto" data-ripple-color="primary">Edit foto</button>
                <button type="button" class="btn btn-primary rounded-0" role="button" data-bs-toggle="modal" data-bs-target="#edit" data-ripple-color="primary">Edit profil</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>


{{-- count data --}}
<h1 class="bg-light mb-0 p-4 text-uppercase text-center w-100">Count all data </h1>  
<hr>

<div class="w-100 d-flex justify-content-center flex-wrap pt-3 ms-4 mb-4 align-content-start">


  <div class="card text-bg-primary mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">Pengguna </div>
      <div class="card-body">
          <h5 class="card-title text-center fs-1">{{ $user }}</h5>
          <p class="card-title text-center fs-5 text-uppercase">(pengguna)</p>
          <p class="card-text">Data pengguna yang terdaftar di aplikasi, baik pengguna jenis pekerja maupun klien</p>
      </div>
    <a href="/admin/pengguna" class="stretched-link"></a>
  </div>

  <div class="card text-bg-secondary mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">Skill </div>
    <div class="card-body">
        <h5 class="card-title text-center fs-1">{{ $Bidang }}</h5>
        <p class="card-title text-center fs-5 text-uppercase">(Pilihan)</p>
        <p class="card-text">Data bidang pekerjaan yang tersedia untuk pekerja lepas yang bisa di pilih</p>
    </div>
    <a href="/admin/bidang" class="stretched-link"></a>
  </div>

  <div class="card text-bg-success mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">Skill pekerja </div>
    <div class="card-body">
        <h5 class="card-title text-center fs-1">{{ $skil }}</h5>
        <p class="card-title text-center fs-5 text-uppercase">(terdaftar)</p>
        <p class="card-text">Jasa yang dibat pekerja untuk ditawarkan</p>
    </div>

  </div>

  <div class="card text-bg-danger mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">lowongan </div>
    <div class="card-body">
        <h5 class="card-title text-center fs-1">{{ $lowongan }}</h5>
        <p class="card-title text-center fs-5 text-uppercase">(tersedia)</p>
        <p class="card-text">Data lowongan yang tersedia di aplikasi</p>
    </div>

  </div>

  <div class="card text-bg-warning mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">lamaran </div>
    <div class="card-body">
        <h5 class="card-title text-center fs-1">{{ $lamaran }}</h5>
        <p class="card-title text-center fs-5 text-uppercase">(pelamar)</p>
        <p class="card-text">Data semua lamaran yang di ajukan oleh pekerja.</p>
    </div>

  </div>

  <div class="card text-bg-dark mb-3 me-3 rounded-0" style="max-width: 18rem;">
    <div class="card-header text-uppercase fs-3 fw-bold">permintaan </div>
    <div class="card-body">
        <h5 class="card-title text-center fs-1">{{ $permintaan }}</h5>
        <p class="card-title text-center fs-5 text-uppercase">(permintaan)</p>
        <p class="card-text">Data permintaan kepadfa pekerja oleh klien</p>
    </div>

  </div>

</div>
{{-- Edit     --}}
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-0 ">
          <div class="modal-header text-wrap bg-dark rounded-0">
              <div class="d-flex flex-column">
                  <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
              </div>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fw-bolder fs-5 row g-3 p-4">
          <form action="{{ url('/admin/profil/edit'); }}" method="POST" class="row g-3"> 
              @csrf
              <div class="col-md-12">
                  <label for="nama" class="form-label text-uppercase">Nama Pengguna</label>
                  <input type="text" name="nama" class="form-control rounded-0" id="nama" value="{{ auth()->user()->name }}" required>
              </div>
              <div class="col-md-6">
                  <label for="email" class="form-label text-uppercase">Email Pengguna</label>
                  <input type="text" name="email" class="form-control rounded-0" id="email" value="{{ auth()->user()->email }}" required>
              </div>
              <div class="col-md-6">
                  <label for="lahir" class="form-label text-uppercase">Tgl Lahir</label>
                  <input type="date" name="lahir" class="form-control rounded-0" id="lahir" value="{{ auth()->user()->lahir }}" required>
              </div>
              <div class="col-12">
                  <label for="notlp" class="form-label text-uppercase">Telepon/Hp</label>
                  <input type="text" name="notlp" class="form-control rounded-0" id="notlp" value="{{ auth()->user()->notlp }}" required>
              </div>
              <div class="col-md-6">
                  <label for="jenis" class="form-label text-uppercase">Jenis Kelamin</label>
                  <select id="jenis" name="jenis" class="form-select rounded-0"  required>
                          <option selected value="">Pilih</option>
                          <option value="Pria" @if (auth()->user()->kelamin == 'Pria') selected @endif>Pria</option>
                          <option value="Wanita" @if (auth()->user()->kelamin == 'Wanita') selected @endif>Wanita</option>
                  </select>
              </div>
              <div class="col-md-6">
                  <label for="daerah" class="form-label text-uppercase">Alamat</label>
                  <input type="text" name="daerah" class="form-control rounded-0" id="daerah" value="{{ auth()->user()->daerah }}" required>
              </div>
          </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary rounded-0">Edit</button>
              </form>  
          </div>
      </div>
  </div>
</div>
{{-- Edit Foto    --}}
<div class="modal fade" id="foto" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-0 ">
              <div class="modal-header text-wrap bg-dark rounded-0">
                  <div class="d-flex flex-column">
                      <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
                  </div>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
          <form action="{{ url('/admin/profil/foto'); }}" method="POST" class="row g-3" enctype="multipart/form-data"> 
              <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                  @csrf
                  <div class="col-md-12">
                      <label for="image" class="form-label text-uppercase">Masukan foto anda</label>
                      <div class="input-group mb-3">
                          
                          
                          <input type="file" name="image" class="form-control rounded-0" id="image" required>
                          <span class="input-group-text rounded-0">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-diff" viewBox="0 0 16 16">
                                  <path d="M8 5a.5.5 0 0 1 .5.5V7H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V8H6a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 8 5zm-2.5 6.5A.5.5 0 0 1 6 11h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                          </svg>
                          </span>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                      <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-success rounded-0">Perbarui foto saya</button>
              </div>
          </form> 
      </div>
  </div>
</div>


@endsection