@extends('dashboard.navigasi')

@section('konten')

<div class="w-100 d-flex justify-content-start flex-wrap pt-3 ms-4 align-content-start">
    <div class="d-flex justify-content-between w-100">
        <h2 class="w-50 text-uppercase">
            Data Bidang Profesi
            <!-- Button trigger modal -->
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen"><img src="../dashboard_asset/navigasi/img/question-mark.png" class="bi pe-none me-2" style="width: 32px" alt="" srcset=""></a>
        </h2>

        <div class="row g-3 align-items-center me-4">
            <form action="" class="d-flex justify-content-between" style="width: 300px">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary rounded-0">CARI</button>
                </div>
                <div class="col-auto">
                    <input type="text" placeholder="Masukan id bidang" id="inputPassword6" class="form-control rounded-0" aria-describedby="passwordHelpInline">
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
    <a class="btn btn-primary rounded-0 mb-3" href="/admin/permintaan/update">Perbarui semua status</a>

    <table class="table me-4" style="overflow: scroll">
        <thead>
            <tr class="text-light fw-bold">
                <th class="bg-dark text-uppercase">id</th>
                <th class="bg-dark text-uppercase">Tanggal dibuat</th>
                <th class="bg-dark text-uppercase">Deskripsi</th>
                <th class="bg-dark text-uppercase">Status permintaan</th>
                <th class="bg-dark text-uppercase">Jasa</th>
                <th class="bg-dark text-uppercase">Pembuat</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($data as $item)
            <tr>
                <th class="text-uppercase">{{ $item->id }}</th>
                <th class="fw-light text-uppercase " style="width: 35%">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="fw-bold mb-1">{{ $item->created_at }}</p> 
                        </div>
                    </div>
                </th>
                <th class="fw-light text-uppercase">{{ $item->deskripsi }}</th>
                <th class="fw-light text-uppercase">{{ $item->status }}</th>
                <th class="fw-light text-uppercase">{{ $item->skil_id }}</th>
                <th class="fw-light text-uppercase">{{ $item->klien->name }}</th>             
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (count($data) == 0)
        <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
            <strong>data kosong</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
     @endif
     @if ($message = Session::get('pesan'))
     <div class="alert alert-success alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
@endsection