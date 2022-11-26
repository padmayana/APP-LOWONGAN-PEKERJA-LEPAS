@extends('navigasi')
@section('konten')
<div class="container">
    <div class="row mt-5 w-100 p-4">
        <div class="col text-center">
            <h3 class=" text-uppercase fw-bold text-start mt-5 text-center">LOWONGAN</h3>
            <P class=" fs-4 text-start mb-5 text-center"> Dengan akses Pekerja anda bisa melihat dan melakukan kegiatan melamar </P>
        </div>
    </div>
    <div class="row w-75 mx-auto">
        <form action="{{ url('pekerja/lowongan') }}" class="col input-group" method="GET">
            @csrf
            <select name="daerah" id="" class="form-select rounded-0" placeholder="First name" >
                <option value="">Daerah</option>
                @foreach ($daerah as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            <select name="bidang" id="" class="form-select rounded-0" placeholder="First name" >
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
<div class="container-fluid" style="max-width: 1600px;">
    <div class="row ">
        @foreach ($data as $item)
            <div class="col-xl-6 ">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-12">
                      <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                              <div class="bg-image hover-zoom ripple rounded ripple-surface h-100">
                                <img src="{{ url('../storage/'.$item->user->image) }}"
                                  class="w-100 h-100" />
                                <a href="#!">
                                  <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                  </div>
                                </a>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                              <h5>{{ $item->nama }}</h5>
                              <div class="d-flex flex-row">
                                <div class="text-danger mb-1 me-2">
                                  <i class="fa fa-star">Oleh:</i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                </div>
                                <span>{{ $item->user->name }}</span>
                              </div>
                              <div class="mt-1 mb-0 text-muted small">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                  </svg>
                                  Lokasi pekerjaan:
                                {{ $item->daerah->nama }}</span>
                              </div>
                              <div class="mb-2 mt-2 text-muted small">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                  </svg>
                                <span class="badge text-bg-primary rounded-0 text-uppercase"> {{ $item->bidang->nama }}</span>
                              </div>
                              <p class="text-truncate mb-4 mb-md-0">
                                {{ $item->deskripsi }}
                              </p>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                              <div class="d-flex flex-row align-items-center mb-1">
                                <h4 class="mb-1 me-1 text-truncate fle"> @currency($item->upah)</h4>
                                <span class="text-danger">/{{ $item->jenis_upah }}</span>
                              </div>
                              <h6 class="text-success">Menerima : {{ $item->terima }}/{{ $item->kuota }} orang</h6>
                              <div class="d-flex flex-column mt-4">
                                <a class="btn btn-primary btn-sm" href="{{ url('/pekerja/lowongan/detail/'.Crypt::encrypt($item ->id)) }}">Details</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>        
        @endforeach
    
      </div>
</div>

  <div class="d-flex w-100 justify-content-center">
    {{ $data->links() }}
</div>
@endsection