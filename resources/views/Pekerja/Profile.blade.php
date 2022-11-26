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
                background-image: url('../storage/{{ auth()->user()->image }}'); 
                background-attachment: local ; b
                ackground-repeat: 
                no-repeat; 
                background-size: cover; 
                background-position: top">
              </div>
              <h5 class="my-3">{{ auth()->user()->name }}
                @if (auth()->user()->kelamin == 'Pria')
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-male" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M9.5 2a.5.5 0 0 1 0-1h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-1 0V2.707L9.871 6.836a5 5 0 1 1-.707-.707L13.293 2H9.5zM6 6a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/>
                  </svg>
                @elseif(auth()->user()->kelamin == 'Wanita')
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
                {{ auth()->user()->daerah }}</p>
              <p class="text-muted mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
                  </svg>
                Pekerja Lepas</p>
              <div class="d-flex justify-content-center mb-2">
                <button type="button" class="btn btn-primary rounded-0" role="button" data-bs-toggle="modal" data-bs-target="#edit" data-ripple-color="primary">Edit profil</button>
                <button type="button" class="btn btn-outline-primary ms-1 rounded-0" role="button" data-bs-toggle="modal" data-bs-target="#skill" data-ripple-color="primary">Tambah skill</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4  rounded-0">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Lengkap</p>
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
                  <p class="mb-0">Tanggal Lahir</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ auth()->user()->lahir }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Telepone/Hp</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ auth()->user()->notlp }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Daerah Kerja</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ auth()->user()->daerah }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">CV</p>
                </div>
                <div class="col-sm-9">
                  @if (auth()->user()->cv != null)
                      <p class="text-muted mb-0"><a href="{{ asset('/pekerja/profil/cv'); }}" target="_blank">Klik tautan untuk lihat</a></p>
                    @else
                    Belum upload CV
                  @endif
                  
                </div>
              </div>
                <hr>
              <div class="row">
                <div class="d-flex mb-2">
                    <button type="button" class="btn btn-success rounded-0 me-2" role="button" data-bs-toggle="modal" data-bs-target="#foto" data-ripple-color="primary">Edit foto</button>
                    <button type="button" class="btn btn-warning rounded-0" role="button" data-bs-toggle="modal" data-bs-target="#cv" data-ripple-color="primary">Edit CV saya</button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- Edit     --}}
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0 ">
                <div class="modal-header text-wrap bg-primary rounded-0">
                    <div class="d-flex flex-column">
                        <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                <form action="{{ url('/pekerja/profil/edit'); }}" method="POST" class="row g-3"> 
                    @csrf
                    <div class="col-md-12">
                        <label for="nama" class="form-label text-uppercase">Nama Pengguna</label>
                        <input type="text" name="nama" class="form-control rounded-0" id="nama" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label text-uppercase">Email Pengguna</label>
                        <input type="text" name="email" class="form-control rounded-0" id="nama" value="{{ auth()->user()->email }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="daerah" class="form-label text-uppercase">Tgl Lahir</label>
                        <input type="date" name="lahir" class="form-control rounded-0" id="nama" value="{{ auth()->user()->lahir }}" required>
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label text-uppercase">Telepon/Hp</label>
                        <input type="text" name="notlp" class="form-control rounded-0" id="nama" value="{{ auth()->user()->notlp }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="upah" class="form-label text-uppercase">Jenis Kelamin</label>
                        <select id="jenis" name="jenis" class="form-select rounded-0"  required>
                                <option selected value="">Pilih</option>
                                <option value="Pria" @if (auth()->user()->kelamin == 'Pria') selected @endif>Pria</option>
                                <option value="Wanita" @if (auth()->user()->kelamin == 'Wanita') selected @endif>Wanita</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="jenis" class="form-label text-uppercase">Daerah Kerja</label>
                        <select id="jenis" name="daerah" class="form-select rounded-0"  required>
                            <option value="">Pilih</option>
                            @foreach ($daerah as $item)
                                <option value="{{ $item->nama }}" @if (auth()->user()->daerah == $item->nama) selected @endif>{{ $item->nama }}</option>
                            @endforeach
                            
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
    {{-- Edit Foto    --}}
    <div class="modal fade" id="foto" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0 ">
                    <div class="modal-header text-wrap bg-primary rounded-0">
                        <div class="d-flex flex-column">
                            <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="{{ url('/pekerja/profil/foto'); }}" method="POST" class="row g-3" enctype="multipart/form-data"> 
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
    {{-- Tambah skill    --}}
    <div class="modal fade" id="skill" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0 ">
                    <div class="modal-header text-wrap bg-primary rounded-0">
                        <div class="d-flex flex-column">
                            <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">Tambah skill</div>    
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/pekerja/profil/skill'); }}" method="POST" class="row g-3"> 
                        <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                            @csrf
                            <div class="col-md-12">
                                <label for="bidang" class="form-label text-uppercase">linkup Bidang</label>
                                <select id="bidang" name="bidang" class="form-select rounded-0"  required>
                                    <option selected value="">Pilih</option>
                                    @foreach ($bidang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="deskripsi" class="form-label text-uppercase">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" class="form-control rounded-0" rows="10" placeholder="Wajib di isi" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="upah" class="form-label text-uppercase">Tarif penawaran</label>
                                <div class="input-group mb-3">
                                  <span class="input-group-text rounded-0" id="basic-addon1">Rp.</span>
                                  <input type="text" name="upah" class="form-control rounded-0" id="upah" placeholder="Wajib di isi" required>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <label for="jenis" class="form-label text-uppercase">Jenis tarif</label>
                                <select id="jenis" name="jenis" class="form-select rounded-0"  required>
                                    <option  value="" selected>Pilih</option>
                                    <option  value="Hari">Hari</option>
                                    <option  value="Bulan">Bulan</option>
                                    <option  value="Tahun">Tahun</option>
                                </select>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary rounded-0">Tambahkan</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    {{-- Edit CV     --}}
    <div class="modal fade" id="cv" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0 ">
                    <div class="modal-header text-wrap bg-primary rounded-0">
                        <div class="d-flex flex-column">
                            <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <form action="{{ url('/pekerja/profil/cv'); }}" method="POST" class="row g-3" enctype="multipart/form-data"> 
                    <div class="modal-body fw-bolder fs-5 row g-3 p-4">
                        @csrf
                        <div class="col-md-12">
                            <label for="cv" class="form-label text-uppercase">Masukan file CV anda</label>
                            <div class="input-group mb-3">
                                
                                
                                <input type="file" name="cv" class="form-control rounded-0" id="cv" required>
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
                            <button type="submit" class="btn btn-warning rounded-0">Perbarui CV  saya</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    
    <hr>
  </section>
  <section>
    <h3 class="text-center pt-3">KEAHLIAN SAYA</h3>
    <div class="container py-5">
      <div class="row justify-content-center">
        @foreach ($skill as $item)
        <div class="col-md-12 col-lg-4 mb-lg-0">
            <div class="card mb-3">
              <div class="d-flex justify-content-between p-3">
                <p class="lead mb-0">{{ $item->bidang->nama }}</p>
              </div>
              <img src="../pengguna_asset/img/Profile/skills.png"
                class="card-img-top mx-auto" alt="Laptop" style="width: 200px"/>
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <p class="small">Dibuat oleh anda pada : {{ $item->created_at }}</p>
                </div>
    
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="mb-0">Penawaran awal</h5>
                  <h5 class="text-dark mb-0">@currency($item->upah) /<span class="small text-danger">{{ $item->jenis_upah }}<span></h5>
                </div>
    
                <div class="d-flex justify-content-between mb-2">
                  <a class="text-muted mb-0" href="" role="button" data-bs-toggle="modal" data-bs-target="#view{{ $item -> id }}" data-ripple-color="primary">Lihat Deskripsi</a>
                  <div class="ms-auto text-warning">
                    <i class="fa fa-star"><a href="{{ url('/pekerja/profil/hapus/'.Crypt::encrypt($item->id)) }}" class="btn btn-danger rounded-0">Hapus</a></i>
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