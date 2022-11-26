@extends('dashboard.navigasi')

@section('konten')




<div class="w-100 d-flex justify-content-center flex-wrap pt-3 ms-4 align-content-start">
    <div class="d-flex justify-content-between w-100">
        <h2 class="w-50 text-uppercase">
            Data Pengguna
            <!-- Button trigger modal -->
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"><img src="../dashboard_asset/navigasi/img/question-mark.png" class="bi pe-none me-2" style="width: 32px" alt="" srcset=""></a>
        </h2>

        <div class="row g-3 align-items-center me-4">
            <form action="/admin/pengguna" method="GET" class="d-flex justify-content-between" style="width: 300px">
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary rounded-0">CARI</button>
                </div>
                <div class="col-auto">
                    <input type="text" value="{{ request('id') }}" name="id" placeholder="Masukan id pengguna" id="inputPassword6" class="form-control rounded-0" aria-describedby="passwordHelpInline">
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
                anda dapat melakukan perubahan data pengguna aplikasi disini!
            </div>
            <div class="modal-footer border-opacity-10">
            <button type="button" class="btn btn-success rounded-0" data-bs-dismiss="modal">Saya paham!</button>
            </div>
        </div>
        </div>
    </div>
    {{--  --}}

    <hr class="w-100 me-4 mb-5">


    <table class="table me-4" style="overflow: scroll">
        <thead>
            <tr class="text-light fw-bold">
                <th class="bg-dark text-uppercase">id</th>
                <th class="bg-dark text-uppercase">Nama</th>
                <th class="bg-dark text-uppercase">no. tlp/hp</th>
                <th class="bg-dark text-uppercase">daerah kerja</th>
                <th class="bg-success text-uppercase text-center" colspan="3">aksi</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($data as $item)
            <tr>
                <th class="text-uppercase">{{ $item -> id }}</th>
                <th class="fw-light text-uppercase " style="width: 35%">
                    <div class="d-flex align-items-center">
                        <img
                            src="../storage/{{ $item -> image }}"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{ $item -> name }}</p>
                            @if ($item -> level == 'Admin')
                                <p class="text-muted mb-0">{{ $item -> email }} <span class="badge text-bg-primary rounded-0 text-uppercase">{{ $item -> level }}</span></p>
                            @elseif ($item -> level == 'Freelancer')
                                <p class="text-muted mb-0">{{ $item -> email }} <span class="badge text-bg-dark rounded-0 text-uppercase">{{ $item -> level }}</span></p>
                            @else
                                <p class="text-muted mb-0">{{ $item -> email }} <span class="badge text-bg-danger rounded-0 text-uppercase">{{ $item -> level }}</span></p>
                            @endif 
                            
                        </div>
                    </div>
                </th>
                <th class="fw-light text-uppercase">{{ $item -> notlp }}</th>
                <th class="fw-light text-uppercase">{{ $item -> daerah }}</th>
                <th class="fw-light text-uppercase text-end" style="width: 1%"><a class="btn btn-warning rounded-0" data-bs-toggle="modal" data-bs-target="#editModal{{ $item -> id }}" type="button" href="#">EDIT</a></th>
                <th class="fw-light text-uppercase text-center" style="width: 1%"><a class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModalLg{{ $item -> id }}" type="button" href="#">VIEW</a></th>
                <th class="fw-light text-uppercase" style="width: 1%"><a class="btn btn-outline-danger rounded-0"  href="#" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item -> id }}">DELETE</a></th>
                {{-- VIEW modal--}}
                <div class="modal fade" id="exampleModalLg{{ $item -> id }}" tabindex="-1" aria-labelledby="ModalLgLabelView" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content rounded-0">
                            <div class="modal-header text-wrap rounded-0 bg-dark">
                                <div class="d-flex flex-column">
                                    <h1 class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelView">VIEW DATA</h1>    
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body fw-bolder fs-5 row g-3">
                                    <div class="mb-3">
                                        <h3 class="text-uppercase">{{ $item -> name }}</h3>
                                        <div class="flex-row fw-bolder">
                                            (ID: {{ $item -> id }}) 
                                            @if ($item -> level == 'Admin')
                                                <span class="badge text-bg-primary rounded-0 text-uppercase">{{ $item -> level }}</span>
                                            @elseif ($item -> level == 'Freelancer')
                                                <span class="badge text-bg-dark rounded-0 text-uppercase">{{ $item -> level }}</span>
                                            @else
                                                <span class="badge text-bg-danger rounded-0 text-uppercase">{{ $item -> level }}</span>
                                            @endif 
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label text-uppercase">Email</label>
                                        <input type="email" class="form-control bg-light rounded-0" id="ModalLgLabelView" aria-describedby="emailHelp" value="{{ $item -> email }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label text-uppercase">No. HP/Tlp</label>
                                        <input type="text" class="form-control bg-light rounded-0" id="ModalLgLabelView" aria-describedby="emailHelp" value="{{ $item -> notlp }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label text-uppercase">Tanggal lahir</label>
                                        <input type="text" class="form-control bg-light rounded-0" id="ModalLgLabelView" aria-describedby="emailHelp" value="{{ $item -> lahir }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label text-uppercase">Jenis kelamin</label>
                                        <input type="text" class="form-control bg-light rounded-0 text-capitalize" id="ModalLgLabelView" aria-describedby="emailHelp" value="{{ $item -> kelamin }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1" class="form-label text-uppercase">Daerah kerja</label>
                                        <input type="text" class="form-control bg-light rounded-0 text-capitalize" id="ModalLgLabelView" aria-describedby="emailHelp" value="{{ $item -> daerah }}" readonly>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>    
                {{-- EDIT modal--}}
                <div class="modal fade" id="editModal{{ $item -> id }}" tabindex="-1" aria-labelledby="ModalLgLabelEdit" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content rounded-0">
                            <div class="modal-header text-wrap bg-dark rounded-0">
                                <div class="d-flex flex-column">
                                    <div class="modal-title h4 text-truncate fw-bolder text-uppercase text-light" id="ModalLgLabelEdit">EDIT DATA PENGGUNA <h1 class="badge text-bg-primary rounded-0">ID: {{ $item -> id }}</h1></div> 
                                </div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/admin/pengguna/{{Crypt::encrypt($item -> id)}}" method="POST">
                                
                                @csrf
                                @method('PUT')
                                <div class="modal-body fw-bolder fs-5 row g-3">
                                    {{-- <div class="col-md-12" style="display: none">
                                        <input type="hidden" class="form-control rounded-0" id="email" value="{{ $item -> id }}" name="id">
                                    </div> --}}
                                    <div class="col-md-12">
                                        <label for="email" class="form-label text-uppercase">Email</label>
                                        <input type="email" class="form-control rounded-0" id="email" value="{{ $item -> email }}" name="email">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="nama" class="form-label text-uppercase">Nama</label>
                                        <input type="text" class="form-control rounded-0" id="nama" value="{{ $item -> name }}" name="name">
                                    </div>
                                    <div class="col-6">
                                        <label for="daerah" class="form-label text-uppercase">Daerah kerja</label>
                                        <select name="daerah" id="daerah" class="form-control rounded-0">
                                            @foreach ($daerah as $lokasi)
                                               <option value="{{ $lokasi -> nama }}">{{ $lokasi -> nama }}</option> 
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="level" class="form-label text-uppercase">Level pengguna</label>
                                        <select name="level" id="level" class="form-control rounded-0">
                                            <option value="Freelancer">Frelancer</option>
                                            <option value="Klien">Klien</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no" class="form-label text-uppercase">No. Tlp/HP</label>
                                        <input type="text" class="form-control rounded-0" id="no" name="notlp" value="{{ $item -> notlp }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="no" class="form-label text-uppercase">TGL lahir</label>
                                        <input type="date" class="form-control rounded-0" id="no" name="lahir" value="{{ $item -> lahir }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="kelamin" class="form-label text-uppercase">Jenis kelamin</label>
                                        <select name="kelamin" id="kelamin" class="form-control rounded-0">
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
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
                  <div class="modal fade" id="hapusModal{{ $item -> id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content rounded-0">
                        <div class="modal-header bg-warning rounded-0">
                          <img src="../dashboard_asset/user/img_asset/warning.png" style="width: 32px;" class="modal-title me-3" alt="">
                          <h5 class="modal-title text-uppercase fw-bold text-danger">Peringatan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body fw-light fs-5">
                          Apakah anda yakin menghapus data dengan ID Pengguna: {{ $item ->id }}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary rounded-0 me-3" data-bs-dismiss="modal">Batal</button>
                          <a class="btn btn-danger rounded-0" href="/admin/pengguna/delete/{{  Crypt::encrypt($item -> id) }}" >hapus</a>
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
    @if (count($data) == 0)
        <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
            <strong>data tidak ditemukan</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
    @endif
    
        

    
    <div class="d-felx justify-content-center" style="width: fit-content">

        {{ $data->links() }}

    </div>
    
</div>

@endsection