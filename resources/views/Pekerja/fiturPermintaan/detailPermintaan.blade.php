@extends('navigasi')
@section('konten')


<section>
    <div class="container py-5">
    <h3 class="text-center pb-2">INFORMASI PERMINTAAN</h3>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4 py-5">
            <div class="card-body text-center">
                <div class="rounded bg-dark d-felx m-auto" style="padding: 25%; 
                width: 25%; 
                height: 25%; 
                background-image: url('{{ URL::asset('storage/'.$data->klien->image) }}'); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: top">
                </div>
              <h5 class="my-3">{{ $data->klien->name }}</h5>
              <p class="mb-1 badge bg-primary text-white rounded-0 text-uppercase">{{ $data->klien->level }}</p>
              <p class="text-muted mb-4">(Pembuat permintaan)</p>
              <div class="d-flex justify-content-center mb-2">
                  @if ($data->status == 'menunggu')
                      <a class="btn btn-outline-success rounded-0 mt-4 me-2" data-bs-toggle="modal" data-bs-target="#terima" type="button">Terima permintaan</a>  
                      <a class="btn btn-outline-danger rounded-0 mt-4" data-bs-toggle="modal" data-bs-target="#tolak" type="button">Tolak permintaan</a>  
                  @elseif ($data->status == 'diterima')
                    @if (!isset($upah))
                        <a href="" class="btn btn-outline-primary rounded-0 mt-4"  role="button" data-bs-toggle="modal" data-bs-target="#buat">Buat kesepakatan upah</a>
                    @endif
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
                  <p class="mb-0">{{ $data->klien->email }}</p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-outbound-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z"/>
                      </svg>
                  <p class="mb-0">{{ $data->klien->notlp }}</p>
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
                      <h4 class="mb-0"><span class="text-primary fw-bold me-1 text-uppercase">Profil klien</span></h4>
                    </div>
                  </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nama</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">
                          {{ $data->klien->name }}</p>
                    </div>
                  </div>
                  <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                      </svg>
                      {{ $data->klien->daerah }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Tgl_lahir</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $data->klien->lahir }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <h4 class="mb-4"><span class="text-primary fw-bold me-1 text-uppercase">Detail permintaan</span></h4>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Bidang keahlian</p>
                    </div>
                    <div class="col-sm-9">
                        @foreach ($bidang as $item1)
                            @if ($item1->id == $data->skil->bidang_id)
                                <span class="badge bg-primary rounded-0">{{ $item1->nama }}</span>  
                            @endif
                      @endforeach
                    </div>
                  </div>
                  <hr>
                  <h5 class="mb-4"><span class="text-dark fw-bold me-1 text-uppercase">Deskripsi permintaan</span></h5>
                  <p class="mb-4"> <strong>Kpd. {{ auth()->user()->name }}</strong> </p>
                  <p class="mb-1">{{ $data->deskripsi }}</p>
                </div>
              </div>
            </div>
          </div>
          @if (isset($upah))
             <div class="row mt-4">
                <div class="col-md-12">
                  <div class="card mb-4 mb-md-0">
                    <div class="card-body">
                      <h4 class="mb-4"><span class="text-primary fw-bold me-1 text-uppercase">Menetapkan upah</span><a class="fs-6 text-warning"  role="button" data-bs-toggle="modal" data-bs-target="#edit">edit</a></h4>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Upah</p>
                        </div>
                        <div class="col-sm-8">
                          <p class="mb-0">: @currency($upah->upah) /{{$upah->jenis_upah}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-8">
                          <p class="mb-0">: {{$upah->status}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Mulai pekerjaan</p>
                        </div>
                        <div class="col-sm-8">
                          <p class="mb-0">: {{$upah->mulai}}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <p class="mb-0">Selesai pekerja</p>
                        </div>
                        <div class="col-sm-8">
                          <p class="mb-0">: {{$upah->selesai}}</p>
                        </div>
                      </div>
                      @if ($upah->status == 'setuju')
                        @if (isset($total))
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <p class="mb-0 fw-bold">Total Pembayaran</p>
                          </div>
                          <div class="col-sm-8">
                            <p class="mb-0 fw-bold">: @currency($total).00</p>
                          </div>
                        </div>
                        @endif
                        @if ($data->status_pekerjaan == null)
                        <hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <a href="{{ url('/pekerja/permintaan/kerja/'.Crypt::encrypt($data->id).'/'.Crypt::encrypt($upah->id)) }}" class="btn btn-outline-primary rounded-0 w-100">MULAI KERJAKAN</a>
                              </div>
                            </div>  
                        @endif
                        @if ($data->status_pekerjaan == 'mengerjakan')
                        <hr>
                            <div class="row">
                              <div class="col-sm-12">
                                <a href="{{ url('/pekerja/permintaan/selesai/'.Crypt::encrypt($data->id).'/'.Crypt::encrypt($upah->id)) }}" class="btn btn-outline-primary rounded-0 w-100">SELESAI</a>
                              </div>
                            </div>  
                        @endif   
                      @elseif($upah->status == 'menunggu')
                      <hr>
                        <div class="row">
                          <div class="col-sm-12">
                            <p class="mb-0 fw-bold text-center text-success">Menunggu konfirmasi klien</p>
                          </div>
                        </div>
                      @else
                      <hr>
                        <div class="row">
                          <div class="col-sm-12">
                            <p class="mb-0 fw-bold text-center text-danger">Ditolak</p>
                          </div>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div> 
          @endif
        </div>
      </div>
    </div>  
  </section>
  {{-- MODAL TERIMA --}}
  <div class="modal fade" id="terima" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header bg-primary rounded-0">
          <h5 class="modal-title text-uppercase fw-bold text-white">Anda yakin?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fw-light fs-5">
          Apakah anda yakin menerima permintaan?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
          <a class="btn btn-success rounded-0" href="{{ url('/pekerja/permintaan/terima/'.Crypt::encrypt($data->id)) }}" >Yakin</a>
        </div>
      </div>
    </div>
  </div>
  {{-- MODAL TOLAK --}}
  <div class="modal fade" id="tolak" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-0">
        <div class="modal-header bg-warning rounded-0">
          <h5 class="modal-title text-uppercase fw-bold text-danger">Peringatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fw-light fs-5">
          Apakah anda yakin menolak tawaran ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
          <a class="btn btn-danger rounded-0" href="{{ url('/pekerja/permintaan/tolak/'.Crypt::encrypt($data->id)) }}" >Yakin</a>
        </div>
      </div>
    </div>
  </div>
  {{-- edit penetapan upah --}}
@if (isset($upah))
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content rounded-0 ">
            <div class="modal-header text-wrap bg-primary rounded-0">
                <div class="d-flex flex-column">
                    <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT UPAH</div>    
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body fw-bolder fs-5 row g-3 p-4">
              <form action="{{ url('pekerja/upah/edit/'.Crypt::encrypt($upah->id))}}" method="POST" class="row g-3"> 
                @csrf
                @method('PUT')
                  <div class="col-md-7">
                    <label for="upah" class="form-label text-uppercase">Jumlah upah</label>
                    <div class="input-group mb-3">
                      <span class="input-group-text rounded-0" id="basic-addon1">Rp.</span>
                      <input type="text" name="upah" class="form-control rounded-0" id="upah" placeholder="Wajib di isi" value="{{ $upah->upah }}" required>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <label for="jenis" class="form-label text-uppercase">Jenis upah</label>
                    <select name="jenis" id="jenis" class="form-control rounded-0" required>
                      <option value="Hari" @if ($upah->jenis_upah == 'Hari') selected @endif>/Hari</option>
                      <option value="Bulan" @if ($upah->jenis_upah == 'Bulan') selected @endif>/Bulan</option>
                      <option value="Tahun" @if ($upah->jenis_upah == 'Tahun') selected @endif>/Tahun</option>
                    </select>

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
@endif

{{-- buat penetapan upah--}}
<div class="modal fade" id="buat" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-0 ">
          <div class="modal-header text-wrap bg-primary rounded-0">
              <div class="d-flex flex-column">
                  <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">Tetapkan upah</div>    
              </div>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fw-bolder fs-5 row g-3 p-4">
            <form action="{{ url('pekerja/upah/buat/'.Crypt::encrypt($data->id))}}" method="POST" class="row g-3"> 
              @csrf
              @method('PUT')
                <div class="col-md-7">
                  <label for="upah" class="form-label text-uppercase">Jumlah upah</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text rounded-0" id="basic-addon1">Rp.</span>
                    <input type="text" name="upah" class="form-control rounded-0" id="upah" placeholder="Wajib di isi" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <label for="jenis" class="form-label text-uppercase">Jenis upah</label>
                  <select name="jenis" id="jenis" class="form-control rounded-0" required>
                    <option selected value="">Pilih</option>
                    <option value="Hari">/Hari</option>
                    <option value="Bulan">/Bulan</option>
                    <option value="Tahun">/Tahun</option>
                  </select>

                </div>
          </div>
          <div class="modal-footer">
                  <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                  <button type="submit" class="btn btn-primary rounded-0">Buat</button>
              </form>  
          </div>
      </div>
  </div>
</div>
@include('footer')
@endsection