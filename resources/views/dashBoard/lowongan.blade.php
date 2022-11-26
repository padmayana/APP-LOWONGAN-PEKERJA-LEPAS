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
            <form action="/admin/lowongan" method="GET" class="d-flex justify-content-between" style="width: 300px">
                @csrf
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary rounded-0">CARI</button>
                </div>
                <div class="col-auto">
                    <input type="text" value="{{ request('id') }}" name="id" placeholder="Masukan ID yang di cari" id="inputPassword6" class="form-control rounded-0" aria-describedby="passwordHelpInline">
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


    <table class="table me-4" style="overflow: scroll">
        <thead>
            <tr class="text-light fw-bold">
                <th class="bg-dark text-uppercase">Id</th>
                <th class="bg-dark text-uppercase">Klien</th>
                <th class="bg-dark text-uppercase">Nama lowongan</th>
            </tr>
        </thead>
        <tbody class="bg-light">
            @foreach ($data as $item)
            <tr>
                <th class="text-uppercase">{{ $item->id }}</th>
                <th class="fw-light text-uppercase " style="width: 35%">
                    <div class="d-flex align-items-center">
                        
                        <div class="">
                            <p class="fw-bold mb-1">{{ $item->user->name }} <span class="badge text-bg-danger ms-4 rounded-0 text-uppercase">{{ $item ->user->level }}</span></p>
                                <p class="text-muted mb-0">ID Pengguna: {{ $item->user_id }}</p>                         
                        </div>
                    </div>
                </th>
                <th class="fw-light text-uppercase">
                    <p class="fw-bold mb-1">{{ $item->nama }}</p> 
                    <a href="/admin/lowongan/{{  Crypt::encrypt($item ->id) }}"">Klik untuk lihat detail</a>
                </th>
            </tr>             
            @endforeach
        </tbody>
    </table>
    <div class="d-flex w-100 justify-content-center">
        {{ $data->links() }}
    </div>
    @if (count($data) == 0)
        <div class="alert alert-danger alert-dismissible fade show w-100 me-4 rounded-0" role="alert">
            <strong>Antrian status menunggu kosong</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>   
    @endif
</div>
@endsection