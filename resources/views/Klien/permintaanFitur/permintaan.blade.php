@extends('navigasi')
@section('konten')
<div class="container mx-auto d-flex flex-column align-items-center mb-5 mt-5 row row-cols-lg-auto g-3 align-items-center kenapa">
    <div class="row mt-5 w-100">
      <div class="col text-center">
          <h3 class=" text-uppercase fw-bold text-start mt-5 text-center">PERMINTAAN</h3>
          <P class=" fs-4 text-start mb-5 text-center"> Dengan akses klien anda bisa membuat permintaan namun harus menunggu konfirmasi dari pekerja untuk menerima permintaan anda! </P>
      </div>
            
    </div>
    <div class="row w-75 mx-auto">
      <form action="{{ url('/klien/permintaan/cari') }}" class="col input-group" method="GET">
          @csrf
          <select name="bidang" id="" class="form-select rounded-0" placeholder="" required>
              <option value="">Bidang profesi</option>
              @foreach ($bidang as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
              
          </select>
          <button type="submit" class="btn btn-primary rounded-0">Cari</button>
      </form> 
  </div>
</div>
<hr>
<h3 class="w-100 text-uppercase fw-bold text-center mt-5 mb-5">Permintaan yang telah dibuat</h3>
@if (count($data1) > 0)
<div class="container mx-auto row p-2">
  <h5 class="w-100 text-uppercase fw-bold mt-5 mb-2">Menunggu konfirmasi pekerja <hr></h5>
  @foreach ($data1 as $item)
    <div class="col-xl-6 mb-4">
      <div class="card rounded-0">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <div class=" col">
                    <p class="fw-bold mb-1 text-uppercase text-truncate"> kepada @if ($item->pekerja->kelamin == 'Pria') Saudara @elseif($item->pekerja->kelamin == 'Wanita') Saudari @else Yth. @endif{{ $item->pekerja->name }}</p>
                    <p class="text-muted mb-0">{{ $item->created_at }}</p>
                    @foreach ($bidang as $item1)
                        @if ($item1->id == $item->skil->bidang_id)
                          <span class="badge text-bg-primary rounded-0 text-uppercase">{{$item1->nama}}</span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-start">
              
            </div>
              <span class="badge text-bg-secondary rounded-0 text-uppercase">{{ $item->status }}</span>
          </div>
        </div>
        <div class="card-footer border-0 bg-primary p-2 d-flex flex-wrap justify-content-around">
          <a
            class="btn btn-link text-light m-0"
            href="{{ url('klien/permintaan/profil/'.Crypt::encrypt($item->skil_id).'/'.Crypt::encrypt($item->id)) }}"
            >LIHAT DETAIL<i class="fas fa-phone ms-2"></i></a>
        </div>
      </div>
    </div>
  @endforeach
    <div class="d-flex w-100 justify-content-center">
        {{ $data1->links() }}
    </div>
</div>
@endif
@if(count($data2) > 0)
<div class="container mx-auto row p-2">
  <h5 class="w-100 text-uppercase fw-bold mt-5 mb-2">Telah diterima pekerja <hr></h5>
  @foreach ($data2 as $item)
    <div class="col-xl-6 mb-4">
      <div class="card rounded-0">
        <div class="card-body">
          <div class="d-flex flex-wrap justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <div class=" col">
                    <p class="fw-bold mb-1 text-uppercase text-truncate"> kepada @if ($item->pekerja->kelamin == 'Pria') Saudara @elseif($item->pekerja->kelamin == 'Wanita') Saudari @else Yth. @endif{{ $item->pekerja->name }}</p>
                    <p class="text-muted mb-0">{{ $item->created_at }}</p>
                    @foreach ($bidang as $item1)
                        @if ($item1->id == $item->skil->bidang_id)
                          <span class="badge text-bg-primary rounded-0 text-uppercase">{{$item1->nama}}</span>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-column align-items-start">
              
            </div>
              <span class="badge text-bg-success rounded-0 text-uppercase">{{ $item->status }}</span>
          </div>
        </div>
        <div class="card-footer border-0 bg-primary p-2 d-flex flex-wrap justify-content-around">
          <a
            class="btn btn-link text-light m-0"
            href="{{ url('klien/permintaan/profil/'.Crypt::encrypt($item->skil_id).'/'.Crypt::encrypt($item->id)) }}"
            >LIHAT DETAIL<i class="fas fa-phone ms-2"></i></a>
        </div>
      </div>
    </div>
  @endforeach
    <div class="d-flex w-100 justify-content-center">
        {{ $data2->links() }}
    </div>
</div>
@endif
@if(count($data3) > 0)

<div class="container mx-auto row">
  <h5 class="w-100 text-uppercase fw-bold mt-5 mb-2">Telah ditolak pekerja <hr></h5>
@foreach ($data3 as $item)

  <div class="col-xl-6 mb-4">
    <div class="card rounded-0">
      <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center w-100">
          <div class="d-flex align-items-center">
              <div class=" col">
                  <p class="fw-bold mb-1 text-uppercase text-truncate"> kepada @if ($item->pekerja->kelamin == 'Pria') Saudara @elseif($item->pekerja->kelamin == 'Wanita') Saudari @else Yth. @endif{{ $item->pekerja->name }}</p>
                  <p class="text-muted mb-0">{{ $item->created_at }}</p>
                  @foreach ($bidang as $item1)
                      @if ($item1->id == $item->skil->bidang_id)
                        <span class="badge text-bg-primary rounded-0 text-uppercase">{{$item1->nama}}</span>
                      @endif
                  @endforeach
                  

              </div>
          </div>
          <div class="d-flex flex-column align-items-start">
            
          </div>
            <span class="badge text-bg-danger rounded-0 text-uppercase">{{ $item->status }}</span>
        </div>
      </div>
      <div class="card-footer border-0 bg-primary p-2 d-flex flex-wrap justify-content-around">
        <a
          class="btn btn-link text-light m-0"
          href="{{ url('klien/permintaan/profil/'.Crypt::encrypt($item->skil_id).'/'.Crypt::encrypt($item->id)) }}"
          >LIHAT DETAIL<i class="fas fa-phone ms-2"></i></a>
      </div>
    </div>
  </div>
@endforeach
  <div class="d-flex w-100 justify-content-center">
      {{ $data3->links() }}
  </div>
</div>
@endif
<div class="container mx-auto row">
  <a class="btn btn-primary rounded-0" href="{{ url('/klien/permintaan/laporan') }}">Buat Laporan</a>
</div>


@include('footer')
@endsection


