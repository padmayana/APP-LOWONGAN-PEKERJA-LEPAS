@extends('navigasi')
@section('konten')
<div class="container w-100">

  <div class="row mt-5 w-100 p-4">
    <div class="col text-center">
        <h3 class=" text-uppercase fw-bold text-start mt-5 text-center">pelamar</h3>
        <P class=" fs-4 text-start mb-5 text-center"> Dengan akses pekerja anda bisa melihat status lamaran </P>
    </div>
          
  </div>
    @if (count($data) !== 0)
      <hr>
       <div class="col text-start">
          <h3 class=" text-uppercase fw-bold text-start mt-5 text-start ps-4">Lamaran yang telah dibuat</h3>
        </div> 
    @endif
  
  <div class="row p-4">
  @foreach ($data as $item)
   <div class="col-xl-6 mb-4">
      <div class="card rounded-0">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <div class="rounded-0  me-3" 
                    style="background-image: url({{ URL::asset('../storage/'.$item->user->image) }}); width: 50px;
                    height: 50px;
                    background-attachment: local ; 
                    background-repeat: no-repeat; 
                    background-size: cover; 
                    background-position: top;">
              </div>
              <div class="ms-3">
                <p class="fw-bold mb-1">{{ $item->user->name }}</p>
                <p class="text-muted mb-0">{{ $item->user->email }}</p>
              </div>
            </div>
            @if ($item->status == 'Diterima')
                <span class="badge rounded-0 text-bg-success">{{ $item->status }}</span>
            @endif
            @if ($item->status == 'Menunggu')
                <span class="badge rounded-0 text-bg-warning">{{ $item->status }}</span> 
            @endif
            @if ($item->status == 'Tolak')
                <span class="badge rounded-0 text-bg-danger">{{ $item->status }}</span> 
            @endif
            
          </div>
        </div>
        <div
          class="card-footer border-0 bg-light p-2 d-flex justify-content-start"
        >
          <a
            class="btn btn-outline-primary m-0 rounded-0"
            href="{{ url('/pekerja/lowongan/detail/'.Crypt::encrypt($item ->lowongan_id)) }}"
            role="button"
            data-ripple-color="primary"
            >LIHAT DETAIL
          </a>
        </div>
      </div>
    </div>
  @endforeach
    <div class="d-felx justify-content-center" style="width: fit-content">
        {{ $data->links() }}
    </div>
  </div>
</div>

@endsection