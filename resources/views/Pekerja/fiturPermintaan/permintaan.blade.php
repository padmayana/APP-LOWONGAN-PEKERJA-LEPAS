@extends('navigasi')
@section('konten')
<section class="pt-5 container">
  @if (count($data1) > 0)
    <h6 class="bg-light p-2 border-top border-bottom">Permintaan menunggu</h6>

    <ul class="list-group list-group-light mb-4 rounded-0">
      @foreach ($data1 as $item)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="{{ URL::asset('storage/'.$item->klien->image) }}" alt="" style="width: 45px; height: 45px"
            class="rounded-circle" />
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->klien->name }}</p>
            <p class="text-muted mb-0">{{ $item->klien->email }} <a href="{{ url('/pekerja/permintaan/'.Crypt::encrypt($item->id)) }}" class="stretched-link">Lihat detail</a></p>
          </div>
        </div>
        @foreach ($bidang as $item1)
          @if ($item1->id == $item->skil->bidang_id)
              <span class="badge bg-primary rounded-0">{{ $item1->nama }}</span>  
          @endif
        @endforeach
        
      </li>
      @endforeach
    </ul>
    <div class="row justify-content-center">
      <div class="" style="width: fit-content">
        {{ $data1->links() }}
      </div>
    </div>
  @endif
  @if (count($data2) > 0)
    <h6 class="bg-light p-2 border-top border-bottom">Permintaan diterima</h6>

    <ul class="list-group list-group-light mb-4 rounded-0">
      @foreach ($data2 as $item)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="{{ URL::asset('storage/'.$item->klien->image) }}" alt="" style="width: 45px; height: 45px"
            class="rounded-circle" />
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->klien->name }}</p>
            <p class="text-muted mb-0">{{ $item->klien->email }} <a href="{{ url('/pekerja/permintaan/'.Crypt::encrypt($item->id)) }}" class="stretched-link">Lihat detail</a></p>
          </div>
        </div>
        @foreach ($bidang as $item1)
          @if ($item1->id == $item->skil->bidang_id)
              <span class="badge bg-success rounded-0">{{ $item1->nama }}</span>  
          @endif
        @endforeach
      </li>
      @endforeach
    </ul>
    <div class="row justify-content-center">
      <div class="" style="width: fit-content">
        {{ $data2->links() }}
      </div>
    </div>
  @endif
    

    @if (count($data3) > 0)
    <h6 class="bg-light p-2 border-top border-bottom">Permintaan ditolak</h6>

    <ul class="list-group list-group-light mb-4 rounded-0">
      @foreach ($data3 as $item)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <img src="{{ URL::asset('storage/'.$item->klien->image) }}" alt="" style="width: 45px; height: 45px"
            class="rounded-circle" />
          <div class="ms-3">
            <p class="fw-bold mb-1">{{ $item->klien->name }}</p>
            <p class="text-muted mb-0">{{ $item->klien->email }} <a href="{{ url('/pekerja/permintaan/'.Crypt::encrypt($item->id)) }}" class="stretched-link">Lihat detail</a></p>
          </div>
        </div>
        @foreach ($bidang as $item1)
          @if ($item1->id == $item->skil->bidang_id)
              <span class="badge bg-danger rounded-0">{{ $item1->nama }}</span>  
          @endif
        @endforeach
      </li>
      @endforeach
    </ul>
    <div class="row justify-content-center">
      <div class="" style="width: fit-content">
        {{ $data3->links() }}
      </div>
    </div>
    @endif
    @if (count($data1) == 0 && count($data2) == 0 && count($data3) == 0)
    <div class="row justify-content-center">
      <div class="" style="width: fit-content">
        <h1 class="text-muted">Anda belum mendapatkan permintaan :)</h1>
      </div>
    </div> 
    @endif
</section>
@endsection