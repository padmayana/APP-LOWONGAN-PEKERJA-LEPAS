@extends('navigasi')
@section('konten')
<div class="container mx-auto d-flex flex-column align-items-center mb-5 mt-5 row row-cols-lg-auto g-3 align-items-center kenapa">
    <div class="row mt-5 w-100">
      <div class="col text-center">
          <h3 class=" text-uppercase fw-bold text-start mt-5 text-center">LOWONGAN</h3>
          <P class=" fs-4 text-start mb-5 text-center"> Dengan akses klien anda bisa membuat lowongan namun harus menunggu konfirmasi dari admin untuk mengiklankan lowongan anda! </P>
      </div>
            
    </div>
    <div class="container-fluid">
      <form action="/klien/lowongan" method="POST" class="row g-3  px-3"> 
        @csrf
          <div class="col-md-6">
            <label for="nama" class="form-label text-uppercase">Nama lowongan</label>
            <input type="text" name="nama" class="form-control rounded-0" id="nama" required>
          </div>
          <div class="col-md-4">
            <label for="bidang" class="form-label text-uppercase">Bidang</label>
            <select name="bidang" id="bidang" class="form-control rounded-0" required>
              <option selected value="">Pilih</option>
              @foreach ($bidang as $item)
                  <option value="{{ $item->id }}" class="text-uppercase">{{ $item->nama }}</option>
              @endforeach
              
            </select>
          </div>
          <div class="col-md-2">
            <label for="daerah" class="form-label text-uppercase">daerah</label>
            <select name="daerah" id="daerah" class="form-control rounded-0" required>
              <option selected value="">Pilih</option>
              @foreach ($daerah as $item)
                  <option value="{{ $item->id }}" class="text-uppercase">{{ $item->nama }}</option>
              @endforeach
              
            </select>
          </div>
          <div class="col-12">
            <label for="deskripsi" class="form-label text-uppercase">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control rounded-0" required></textarea>
          </div>
          <div class="col-md-6">
            <label for="upah" class="form-label text-uppercase">Upah</label>
            <input type="text" name="upah" class="form-control rounded-0" id="upah" required>
          </div>
          <div class="col-md-4">
            <label for="jenis" class="form-label text-uppercase">Jenis upah</label>
            <select id="jenis" name="jenis" class="form-select rounded-0" required>
              <option selected>Pilih</option>
              <option value="Hari">Hari</option>
              <option value="Bulan">Bulan</option>
              <option value="Tahun">Tahun</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="kuota" class="form-label text-uppercase">Kuota</label>
            <input type="text" name="kuota" class="form-control rounded-0" id="kuota" required>
          </div>
          <div class="d-grid gap-2 mt-5">
              <button class="btn btn-primary rounded-0" type="submit">KONFIRMASI</button>
              @if ($message = Session::get('pesan'))
              <div class="alert alert-success alert-dismissible fade show w-100 mt-3 me-4 rounded-0" role="alert">
                  <strong>{{ $message }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          </div>
        </form>
  </div>
</div>
<hr>
<h3 class="w-100 text-uppercase fw-bold text-center mt-5 mb-5">Lowongan yang telah dibuat</h3>
<div class="container mx-auto row p-5">
@foreach ($data as $item)

  <div class="col-xl-6 mb-4">
    <div class="card rounded-0">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center w-100">
          <div class="d-flex align-items-center w-50">
              <div class=" col">
                  <p class="fw-bold mb-1 text-uppercase text-truncate w-75">{{  $item->nama }}</p>
                  <p class="text-muted mb-0">{{ $item->created_at }}</p>
                  <span class="badge text-bg-primary rounded-0 text-uppercase">{{ $item->bidang->nama }}</span>
              </div>
          </div>
          <div class="d-flex flex-column align-items-start mt-3">
            <span class="">Kuota : {{ $item->terima }}/{{ $item->kuota }}</span>
            <span class="">Upah : @currency($item->upah)/{{ $item->jenis_upah }}</span>
            <span class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg>
            {{ $item->daerah->nama }}</span>
          </div>
          @if ($item->status == 'menunggu')
            <span class="badge text-bg-secondary rounded-0 text-uppercase mt-3">{{ $item->status }}</span>
          @endif
          @if ($item->status == 'iklan')
            <span class="badge text-bg-success rounded-0 text-uppercase mt-3">{{ $item->status }}</span>
          @endif
          @if ($item->status == 'tutup')
            <span class="badge text-bg-danger rounded-0 text-uppercase mt-3">{{ $item->status }}</span>
          @endif
          @if ($item->status == 'tolak')
            <span class="badge text-bg-warning rounded-0 text-uppercase mt-3">{{ $item->status }}</span>
          @endif
        </div>
      </div>
      <div class="card-footer border-0 bg-light p-2 d-flex flex-wrap justify-content-around">
        
        @if ($item->status == 'iklan')
          <a
            class="btn btn-link m-0 text-reset"
            href="{{ url('/klien/lowongan/tutup/'.Crypt::encrypt($item ->id)) }}"
            data-ripple-color="primary"
            >TUTUP<i class="fas fa-envelope ms-2"></i></a>
          <a
            class="btn btn-link m-0 text-reset"
            href="{{ url('klien/lowongan/pelamar/'.encrypt($item->id)) }}"
            >PILIH PELAMAR<i class="fas fa-phone ms-2"></i></a> 
        @endif
        @if ($item->status == 'menunggu')
          <a
          class="btn btn-link m-0 text-reset"
          href="#"
          role="button"
          data-bs-toggle="modal" data-bs-target="#edit{{ $item -> id }}"
          data-ripple-color="primary"
          >EDIT<i class="fas fa-phone ms-2"></i></a> 
          <a
          class="btn btn-link m-0 text-reset"
          href="{{ url('klien/lowongan/hapus/'.Crypt::encrypt($item -> id)); }}"
          >HAPUS<i class="fas fa-phone ms-2"></i></a> 
        @endif
        @if ($item->status == 'tutup')
            <a
            class="btn btn-link m-0 text-reset"
            href="{{ url('klien/lowongan/pelamar/'.encrypt($item->id)) }}"
            >LIHAT PEKERJA<i class="fas fa-phone ms-2"></i></a> 
          @endif
        <a
          class="btn btn-link m-0 text-reset"
          href="#"
          role="button"
          data-bs-toggle="modal" data-bs-target="#view{{ $item -> id }}"
          data-ripple-color="primary"
          >LIHAT DESKRIPSI<i class="fas fa-phone ms-2"></i></a>
          <a
          class="btn btn-link m-0 text-danger"
          href="{{ url('/klien/lowongan/laporan/'.encrypt($item->id)) }}"
          >EXPORT PDF<i class="fas fa-phone ms-2"></i></a>
      </div>
    </div>
  </div>
  {{-- View --}}
  <div class="modal fade" id="view{{ $item -> id }}" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-0 ">
          <div class="modal-header text-wrap bg-primary rounded-0">
              <div class="d-flex flex-column">
                  <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">DESKRIPSI LOWONGAN</div>    
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
{{-- Edit     --}}
<div class="modal fade" id="edit{{ $item -> id }}" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content rounded-0 ">
          <div class="modal-header text-wrap bg-primary rounded-0">
              <div class="d-flex flex-column">
                  <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT LOWONGAN</div>    
              </div>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fw-bolder fs-5 row g-3 p-4">
            <form action="{{ url('klien/lowongan/edit/'.Crypt::encrypt($item -> id)); }}" method="POST" class="row g-3"> 
              @csrf
              @method('PUT')
                <div class="col-md-6">
                  <label for="nama" class="form-label text-uppercase">Nama lowongan</label>
                  <input type="text" name="nama" class="form-control rounded-0" id="nama" value="{{ $item->nama }}" required>
                </div>
                <div class="col-md-4">
                  <label for="bidang" class="form-label text-uppercase">Bidang</label>
                  <select name="bidang" id="bidang" class="form-control rounded-0" required>
                    <option selected value="">Pilih</option>
                    @foreach ($bidang as $pilihan)
                        <option value="{{ $pilihan->id }}" class="text-uppercase" @if ($item->bidang_id == $pilihan->id) selected @endif>{{ $pilihan->nama }}</option>
                    @endforeach
                    
                  </select>

                </div>
                <div class="col-md-2">
                  <label for="daerah" class="form-label text-uppercase">daerah</label>
                  <select name="daerah" id="daerah" class="form-control rounded-0" required>
                    <option selected value="">Pilih</option>
                    @foreach ($daerah as $titik)
                        <option value="{{ $titik->id }}" class="text-uppercase" @if ($item->daerah_id ==  $titik->id) selected @endif>{{ $titik->nama }}</option>
                    @endforeach
                    
                  </select>
                </div>
                <div class="col-12">
                  <label for="deskripsi" class="form-label text-uppercase">Deskripsi</label>
                  <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control rounded-0" required>{{ $item->deskripsi }}</textarea>
                </div>
                <div class="col-md-6">
                  <label for="upah" class="form-label text-uppercase">Upah</label>
                  <input type="text" name="upah" class="form-control rounded-0" id="upah" value="{{ $item->upah }}" required>
                </div>
                <div class="col-md-4">
                  <label for="jenis" class="form-label text-uppercase">Jenis upah</label>
                  <select id="jenis" name="jenis" class="form-select rounded-0"  required>
                    <option selected value="">Pilih</option>
                    <option value="Hari" @if ($item->jenis_upah ==  "Hari") selected @endif>Hari</option>
                    <option value="Bulan" @if ($item->jenis_upah ==  "Bulan") selected @endif>Bulan</option>
                    <option value="Tahun" @if ($item->jenis_upah ==  "Tahun") selected @endif>Tahun</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="kuota" class="form-label text-uppercase">Kuota</label>
                  <input type="text" name="kuota" class="form-control rounded-0" id="kuota" value="{{ $item->kuota }}" required>
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
@endforeach
@if ($message = Session::get('aksi'))
      <div class="alert alert-success alert-dismissible fade show w-100 mt-3 rounded-0" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
  <div class="d-flex w-100 justify-content-center">
      {{ $data->links() }}
  </div>
</div>
@include('footer')
@endsection


