@extends('navigasi')
@section('konten')
<section style="">
    <div class="container py-5 ">
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4 rounded-0">
            <div class="card-body text-center">
                <div class="rounded bg-dark d-felx m-auto" style="padding: 25%; 
                width: 25%; 
                height: 25%; 
                background-image: url('../../../../../storage/{{ $user->image }}'); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: top">
              </div>
              <h5 class="my-3">{{ $user->name }}
                @if ($user->kelamin == 'Pria')
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                  </svg>
                @elseif($user->kelamin == 'Wanita')
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-female" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM3 5a5 5 0 1 1 5.5 4.975V12h2a.5.5 0 0 1 0 1h-2v2.5a.5.5 0 0 1-1 0V13h-2a.5.5 0 0 1 0-1h2V9.975A5 5 0 0 1 3 5z"/>
                  </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                  </svg>
                @endif
            </h5>
              <p class="text-muted mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                  </svg>
                {{ $user->daerah }}</p>
              <p class="text-uppercase rounded-0 mb-4 badge bg-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
                  </svg>
                Pelamar</p>
              <div class="d-flex justify-content-center mb-2">
                @if ($pelamar->status == 'Menunggu')
                   <button type="button" class="btn btn-primary rounded-0 w-50" role="button" data-bs-toggle="modal" data-bs-target="#terima" data-ripple-color="primary">TERIMA</button> 
                @elseif($pelamar->status == 'Diterima')
                   <div class="btn btn-success rounded-0 w-50">Pelamar diterima</div> 
                @endif
                  
              </div>
            </div>
          </div>
        </div>
        {{-- Modal terima --}}
        <div class="modal fade" id="terima" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content rounded-0">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menerima lamaran?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Pastikan anda sudah yakin sebelum menerimanya!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-0" data-bs-dismiss="modal">Batal</button>
                <a href="{{ url('klien/lowongan/menerima/'.Crypt::encrypt($pelamar->id).'/'.$lamaran) }}" class="btn btn-outline-primary rounded-0">Menerima</a>
              </div>
            </div>
          </div>
        </div> 
        {{--  --}}
        <div class="col-lg-8">
          <div class="card mb-4  rounded-0">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Tanggal Lahir</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->lahir }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Telepone/Hp</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->notlp }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Daerah Kerja</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->daerah }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">CV</p>
                </div>
                <div class="col-sm-9">
                  @if (isset($user->cv))
                       <p class="fw-light text-danger"><a href="{{ url('klien/lowongan/cv/'.Crypt::encrypt($user->cv)) }}" target="_blank">Klik tautan untuk lihat</a> (matikan extensi IDM)</p>
                  @else
                       <p class="text-danger">Tidak memiliki CV</p>
                  @endif
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
  </section>
  <section>
    <h3 class="text-center pt-3">KEAHLIAN PELAMAR</h3>
    <div class="container py-5">
      <div class="row">
        @foreach ($skill as $item)
        <div class="col-md-12 col-lg-4 mb-lg-0">
            <div class="card mb-3">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">{{ $item->bidang->nama }}</p>
              </div>
              <img src="{{ url('../../pengguna_asset/img/Profile/skills.png') }}"
                class="card-img-top mx-auto" alt="Laptop" style="width: 200px"/>
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small">Dibuat oleh Pelamar pada : {{ $item->created_at }}</p>
                </div>
    
                <div class="d-flex justify-content-between mb-2">
                  <a class="text-muted mb-0" href="" role="button" data-bs-toggle="modal" data-bs-target="#view{{ $item -> id }}" data-ripple-color="primary">Lihat Deskripsi</a>
                  <div class="ms-auto text-warning">
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
  </section>
@endsection