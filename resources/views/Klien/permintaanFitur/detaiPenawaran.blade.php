@extends('navigasi')
@section('konten')
@if (isset($cek))
<section>
  <div class="container py-5">
    <h3 class="text-center pb-2">INFORMASI PERMINTAAN</h3>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                <p class="mb-0">PERJANJIAN UPAH</p>
              </li>
              @if ($cek->status == 'menunggu')
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                <p class="mb-0 text-primary">Menunggu konfirmasi</p>
              </li>
              @endif
              @if (isset($upah))
              <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                <p class="mb-0 text-primary">@currency( $upah->upah) / {{ $upah->jenis_upah }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0 text-primary">Mulai</p>
                <p class="mb-0 text-primary">{{ $upah->mulai }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <p class="mb-0 text-primary">Selesai</p>
                <p class="mb-0 text-primary">{{ $upah->selesai }}</p>
              </li>
              @if ($upah->status == 'setuju' || $upah->status == 'menolak')
                @if ($upah->status == 'setuju')
                @if (isset($upah->selesai))
                  <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <p class="mb-0 text-primary">Total</p>
                    <p class="mb-0 text-primary">@currency($total).00</p>
                  </li>
                @endif
                <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                  <p class="mb-0 text-success">Anda sudah setuju</p>
                </li>
                @else
                <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                  <p class="mb-0 text-danger">Anda sudah menolak</p>
                </li>
                @endif
                
              @else
                <li class="list-group-item d-flex flex-column align-items-center p-3">
                  <a href="" class="btn btn-outline-success rounded-0 w-100"  role="button" data-bs-toggle="modal" data-bs-target="#setuju" data-ripple-color="primary">Setuju </a>
                  <a href="" class="btn btn-outline-danger rounded-0 w-100 mt-2"  role="button" data-bs-toggle="modal" data-bs-target="#tolak" data-ripple-color="primary">Menolak </a>
                  {{-- MODAL setuju --}}
                    <div class="modal fade" id="setuju" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content rounded-0">
                            <div class="modal-header bg-primary rounded-0">
                              <h5 class="modal-title text-uppercase fw-bold text-white">Anda yakin?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-light fs-5">
                              Apakah anda yakin setuju?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
                              <a class="btn btn-success rounded-0" href="{{ url('/klien/upah/setuju/'.Crypt::encrypt($upah->id)) }}" >Yakin</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    {{-- MODAL tolak --}}
                      <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content rounded-0">
                            <div class="modal-header bg-warning rounded-0">
                              <h5 class="modal-title text-uppercase fw-bold text-white">Anda yakin?</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-light fs-5">
                              Apakah anda yakin menolak?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
                              <a class="btn btn-warning rounded-0" href="{{ url('/klien/upah/menolak/'.Crypt::encrypt($upah->id)) }}" >Yakin</a>
                            </div>
                          </div>
                        </div>
                      </div>
                </li>  
              @endif
              
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <h4 class="mb-4"><span class="text-primary fw-bold me-1 text-uppercase">Detail permintaan anda</span></h4>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Dibuat pada tanggal</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $cek->created_at }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Status</p>
                    </div>
                    <div class="col-sm-9">
                      @if ($cek->status == 'menunggu')
                          <p class="mb-1 badge bg-secondary text-white rounded-0 text-uppercase">{{ $cek->status }}</p>
                      @elseif ($cek->status == 'diterima')
                          <p class="mb-1 badge bg-primary text-white rounded-0 text-uppercase">{{ $cek->status }}</p>
                      @elseif ($cek->status == 'ditolak')
                          <p class="mb-1 badge bg-danger text-white rounded-0 text-uppercase">{{ $cek->status }}</p>
                      @endif
                    </div>
                  </div>
                  <hr>
                  @if (isset($upah))
                    @if ($upah->status == 'setuju')
                      @if ($cek->status_pekerjaan != null)
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0">Status pekerjaan</p>
                          </div>
                          <div class="col-sm-9">
                                <p class="mb-1 rounded-0 text-uppercase">{{ $cek->status_pekerjaan}}</p>
                          </div>
                        </div>
                        <hr>
                      @endif
                    @endif
                  @endif
                  <h5 class="mb-4"><span class="text-dark fw-bold me-1 text-uppercase">Deskripsi permintaan</span></h5>
                  <p class="mb-1">{{ $cek->deskripsi }}</p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
</section>
@endif
<section>
    <div class="container @if (isset($cek)) py-2 @else py-5 @endif ">
    <h3 class="text-center pb-2">INFORMASI PENAWARAN</h3>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4 py-5">
            <div class="card-body text-center">
                <div class="rounded bg-dark d-felx m-auto" style="padding: 25%; 
                width: 25%; 
                height: 25%; 
                background-image: url('{{ URL::asset('storage/'.$data->user->image) }}'); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: top">
                </div>
              <h5 class="my-3">{{ $data->user->name }}</h5>
              <p class="mb-1 badge bg-primary text-white rounded-0 text-uppercase">{{ $data->user->level }}</p>
              <p class="text-muted mb-4">(Pembuat penawaran)</p>
              <div class="d-flex justify-content-center mb-2">
                @if (isset($cek))
                  @if ($cek->status == 'menunggu')
                      <a href="{{ url('/klien/permintaan/batal/'.Crypt::encrypt($cek->id)) }}" class="btn btn-danger rounded-0 mt-4">Batalkan permintaan</a>  
                  @elseif ($cek->status == 'diterima' || $cek->status == 'ditolak')
                      <a href="" class="btn btn-outline-primary rounded-0 mt-4"  role="button" data-bs-toggle="modal" data-bs-target="#buat" data-ripple-color="primary">Buat permintaan lagi</a>
                  @endif
                @else
                  <a href="" class="btn btn-outline-primary rounded-0 mt-4"  role="button" data-bs-toggle="modal" data-bs-target="#buat" data-ripple-color="primary">Buat permintaan</a>
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
                    <div class="col-sm-12">
                      <h4 class="mb-0"><span class="text-primary fw-bold me-1 text-uppercase">Profil pekerja</span></h4>
                    </div>
                  </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nama</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">
                          {{ $data->user->name }}</p>
                    </div>
                  </div>
                  <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Lokasi pekerja</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                      </svg>
                      {{ $data->user->daerah }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Tgl_lahir</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data->user->lahir }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">CV</p>
                </div>
                <div class="col-sm-9">
                    @if (isset($data->user->cv))
                       <p class="fw-light text-danger"><a href="{{ url('klien/lowongan/cv/'.Crypt::encrypt($data->user->cv)) }}" target="_blank">Klik tautan untuk lihat</a> (matikan extensi IDM)</p>
                    @else
                        <p class="text-danger">Tidak memiliki CV</p>
                    @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <h4 class="mb-4"><span class="text-primary fw-bold me-1 text-uppercase">Detail penawaran</span></h4>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Bidang keahlian</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ $data->bidang->nama }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Upah yang ditawarkan</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">@currency( $data->upah) / {{ $data->jenis_upah }} (hanya penawaran)</p>
                    </div>
                  </div>
                  <hr>
                  <h5 class="mb-4"><span class="text-dark fw-bold me-1 text-uppercase">Deskripsi kemampuan</span></h5>
                  <p class="mb-1">{{ $data->deskripsi }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- Modal buat permintaan --}}
        <div class="modal fade" id="buat" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content rounded-0 ">
                  <div class="modal-header text-wrap bg-primary rounded-0">
                      <div class="d-flex flex-column">
                          <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">DESKRIPSI Permintaan</div>    
                      </div>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                    <form action="{{ url('/klien/permintaan/buat/'.Crypt::encrypt($data->id)) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control rounded-0" autofocus>

                        </textarea>
        
                  </div>
                  <div class="modal-footer"> 
                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary rounded-0" data-bs-dismiss="modal">Buat</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>  
  </section>
  <section>
    <h3 class="text-center pt-3">SEMUA KEMAMPUAN PEKERJA</h3>
    <div class="container py-5">
      <div class="row justify-content-center">
        @foreach ($skill as $item)
        <div class="col-md-12 col-lg-4 mb-lg-0">
            <div class="card mb-3">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">{{ $item->bidang->nama }}</p>
              </div>
              <img src="{{ URL::asset('../pengguna_asset/img/Profile/skills.png') }}"
                class="card-img-top mx-auto" alt="Laptop" style="width: 200px"/>
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small">Dibuat pada : {{ $item->created_at }}</p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">Menawarkan</h5>
                  <h5 class="text-dark mb-0">@currency($item->upah) /<span class="small text-danger">{{ $item->jenis_upah }}<span></h5>
                </div>
    
                <div class="d-flex justify-content-between mb-2">
                  <a class="text-muted mb-0" href="" role="button" data-bs-toggle="modal" data-bs-target="#view{{ $item ->id }}" data-ripple-color="primary">Lihat Deskripsi</a>
                  <div class="ms-auto text-warning">
                    <i class="fa fa-star"><a href="{{ url('/klien/permintaan/profil/'.Crypt::encrypt($item->id) ) }}" class="btn btn-danger rounded-0">Lihat</a></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
        </div>
        {{-- View Modal --}}
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
      <div class="row justify-content-center">
        <div class="" style="width: fit-content">
          {{ $skill->links() }}
        </div>
      </div>
    
    </div>
    @include('footer')
  </section>
  
@endsection