@extends('navigasi')
@section('konten')
<div class="container">
    <div class="row mt-5 w-100 p-4">
        <div class="col text-center">
            <h3 class=" text-uppercase fw-bold text-start mt-5 text-center">PILIH</h3>
            <P class=" fs-4 text-start mb-5 text-center">Berikut tawaran jasa yang tersedia sesuai bidang keahlian</P>
        </div>
    </div>
</div>

<hr>
<div class="container-fluid" style="max-width: 1600px;">
    <div class="row ">
        @foreach ($data as $item)
        <div class="col-md-12 col-lg-4 mb-lg-0">
            <div class="card mb-3">
              <div class="d-flex justify-content-between p-3">
                <h5 class="mb-0 text-uppercase">{{ $item->user->name }}</h5>
              </div>
              <div class="rounded-circle bg-dark d-felx m-auto" style="padding: 25%; 
                width: 25%; 
                height: 25%; 
                background-image: url({{ URL::asset('storage/'.$item->user->image) }}); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: center">
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                <p class="lead mb-0">{{ $item->bidang->nama }}</p>
                </div>

                <div class="d-flex justify-content-between">
                  <p class="small">Dibuat pada : {{ $item->created_at }}</p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">Penawaran awal</h5>
                  <h5 class="text-dark mb-0">@currency($item->upah) /<span class="small text-danger">{{ $item->jenis_upah }}<span></h5>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <p class="mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                      <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    {{ $item->user->daerah }}</p>
                </div>
    
                <div class="d-flex justify-content-between mb-2">
                  <a class="text-muted mb-0" href="" role="button" data-bs-toggle="modal" data-bs-target="#view{{ $item -> id }}" data-ripple-color="primary">Lihat Deskripsi</a>
                  <div class="ms-auto text-warning">
                    <i class="fa fa-star"><a class="btn btn-primary rounded-0" href="{{ url('/klien/permintaan/profil/'.Crypt::encrypt($item->id)) }}">Buat permintaan</a></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        {{-- View --}}
        <div class="modal fade" id="view{{ $item -> id }}" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content rounded-0 ">
                  <div class="modal-header text-wrap bg-primary rounded-0">
                      <div class="d-flex flex-column">
                          <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">DESKRIPSI SKILL</div>    
                      </div>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                      <P class="p-4">
                                      {{ $item->deskripsi }}
                      </P>
        
                  </div>
                  <div class="modal-footer">
                          <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                  </div>
              </div>
          </div>
        </div>
          
        @endforeach
    
      </div>
</div>

  <div class="d-flex w-100 justify-content-center">
    {{ $data->links() }}
</div>
@endsection