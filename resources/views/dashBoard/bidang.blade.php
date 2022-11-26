@extends('dashboard.navigasi')

@section('konten')

<div class="w-100 d-flex justify-content-center flex-wrap pt-3 ms-4 align-content-start">
    <div class="d-flex justify-content-between w-100">
        <h2 class="w-50 text-uppercase">
            Data Bidang Profesi
            <!-- Button trigger modal -->
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"><img src="../dashboard_asset/navigasi/img/question-mark.png" class="bi pe-none me-2" style="width: 32px" alt="" srcset=""></a>
        </h2>

        <div class="row g-3 align-items-center me-4">
            <form action="/admin/bidang" method="GET" class="d-flex justify-content-between" style="width: 300px">
                @csrf
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary rounded-0">CARI</button>
                </div>
                <div class="col-auto">
                    <input type="text" value="{{ request('kata') }}" name="kata" placeholder="Masukan kata yang di cari" id="inputPassword6" class="form-control rounded-0" aria-describedby="passwordHelpInline">
                </div>
            </form>
        </div>
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
                Disini anda dapat mengatur data bidang profesi yang tersedia!
            </div>
            <div class="modal-footer border-opacity-10">
            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">Saya paham!</button>
            </div>
        </div>
        </div>
    </div>
    {{--  --}}

    <hr class="w-100 me-4 mb-5">
    <a class="btn btn-primary me-auto rounded-0 mb-3" data-bs-toggle="modal" data-bs-target="#tambahModal" type="button" href="#">Tambah</a>
    {{-- Tambah modal--}}
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="ModalLgLabelEdit" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content rounded-0 ">
                <div class="modal-header text-wrap bg-dark rounded-0">
                    <div class="d-flex flex-column">
                        <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">TAMBAH BIDANG</div>    
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/bidang" method="POST">
                    @csrf
                    <div class="modal-body fw-bolder fs-5 row g-3">
                        <div class="col-12">
                            <label for="nama" class="form-label text-uppercase">Nama bidang</label>
                            <input type="text" name="nama" class="form-control rounded-0">
                        </div>
                        <div class="col-12">
                            <label for="penjelasan" class="form-label text-uppercase">Penjelasan bidang</label>
                            <textarea name="deskripsi" id="penjelasan" cols="30" rows="10" class="form-control rounded-0"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-0">Tambah</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>  

    <table class="table me-4" style="overflow: scroll">
        <thead>
            <tr class="text-light fw-bold">
                <th class="bg-dark text-uppercase">id</th>
                <th class="bg-dark text-uppercase">Nama profesi</th>
                <th class="bg-dark text-uppercase">Deskripsi</th>
                <th class="bg-success text-uppercase text-center" colspan="3">aksi</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($data as $item)
            <tr>
                <th class="text-uppercase">{{ $item ->id }}</th>
                <th class="fw-light text-uppercase " style="width: 35%">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="fw-bold mb-1">{{ $item ->nama }}</p> 
                        </div>
                    </div>
                </th>
                <th class="fw-light text-uppercase"> 
                    <a class="" data-bs-toggle="modal" data-bs-target="#viewModal{{ $item ->id }}" type="button" href="#">Klik link untuk lihat detail</a>
                        

                    
                    
                </th>
                <th class="fw-light text-uppercase text-end" style="width: 1%"><a class="btn btn-warning rounded-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $item ->id }}" type="button" href="#">EDIT</a></th>
                <th class="fw-light text-uppercase" style="width: 1%"><a class="btn btn-outline-danger rounded-0"  href="#" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item ->id }}">DELETE</a></th>
               
                {{-- VIEW modal--}}
                <div class="modal fade" id="viewModal{{ $item ->id }}" tabindex="-1" aria-labelledby="ModalLgLabelEdit" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content rounded-0 ">
                            <div class="modal-header text-wrap bg-dark rounded-0">
                                <div class="d-flex flex-column">
                                    <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit"> Deskripsi profesi</div>    
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-light fs-4 row g-3 m-3">
                                {{ $item ->deskripsi }}  
                            </div>
                        </div>
                    </div>
                </div>  

                {{-- EDIT modal--}}
                <div class="modal fade" id="editModal{{ $item ->id }}" tabindex="-1" aria-labelledby="ModalLgLabelEdit" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content rounded-0 ">
                            <div class="modal-header text-wrap bg-dark rounded-0">
                                <div class="d-flex flex-column">
                                    <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT DATA PROFESI <h1 class="badge text-bg-primary rounded-0">ID: 1</h1></div>    
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/admin/bidang/{{Crypt::encrypt($item ->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body fw-bolder fs-5 row g-3">
                                    <div class="col-12">
                                        <label for="nama" class="form-label text-uppercase">Nama bidang</label>
                                        <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" name="nama" value="{{ $item ->nama }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="penjelasan" class="form-label text-uppercase">Penjelasan bidang</label>
                                        <textarea id="penjelasan" cols="30" rows="10" class="form-control rounded-0 @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $item ->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-warning rounded-0">Simpan perubahan</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>  
                {{-- MODAL HAPUS --}}
                <div class="modal fade" id="hapusModal{{ $item ->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content rounded-0">
                        <div class="modal-header bg-warning rounded-0">
                          <img src="../dashboard_asset/user/img_asset/warning.png" style="width: 32px;" class="modal-title me-3" alt="">
                          <h5 class="modal-title text-uppercase fw-bold text-danger">Peringatan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body fw-light fs-5">
                          Apakah anda yakin menghapus data dengan ID Bidang: {{ $item ->id }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
                          <a class="btn btn-danger rounded-0" href="/admin/bidang/delete/{{  Crypt::encrypt($item ->id) }}" >hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </tr>           
            @endforeach
        </tbody>
    </table>
    @if ($message = Session::get('pesan'))
        <div class="toast fade show position-absolute rounded-0" style="bottom: 30px; right: 20px" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#007aff"></rect></svg>
      
              <strong class="me-auto">Hasil aksi</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    @endif
    @if ($message = Session::get('sukses'))
    <div class="alert alert-success alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
        <strong>{{$message}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
    @endif
    @if ($message = Session::get('gagal'))
        <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif
    <div class="d-felx justify-content-center" style="width: fit-content">

        {{ $data->links() }}

    </div>
</div>
@endsection