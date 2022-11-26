<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="shortcut icon" href="{{ URL::asset('../pengguna_asset/img/web/logoputih.png')}}" type="image">
    {{-- Bootstrap CSS --}}
  <link href="{{ URL::asset('../bootstrap/CSS/bootstrap.min.css')}}" rel="stylesheet">
  {{-- custom CSS --}}
  <link rel="stylesheet" href="{{ URL::asset('../login_asset/CSS/style.css')}}">
</head>
<body class="background-radial-gradient">
    
<!-- Section: Design Block -->
    <section class=" d-flex align-items-center overflow-hidden " style="  overflow-y: auto; "> 
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5" style="height: 100%">
            <div class="row gx-lg-5 align-items-center mb-5 justif justify-content-center">
        
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                {{-- <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div> --}}
        
                    <div class="card bg-glass rounded-0">
                        <div class="card-body px-4 py-5 px-md-5 rounded-0">
                            <h2 class="fw-bold mb-2 text-uppercase">REGISTRASI</h2>
                            <p class="text-black-50 mb-5">MASUKAN DATA DIRI ANDA</p>
                            <form class="row g-3" method="POST" action="/registrasi/daftar/{{ $level }}/{{ $email }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-4">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="name" id="nama" class="form-control rounded-0 @error('name') is-invalid @enderror" placeholder="Masukan Nama" value="{{ request('name') }}">
                                </div>

                                <div class="form-outline mb-4">
                                    <label for="Pasword" class="form-label">Pasword</label>
                                    <input type="password" id="Pasword" name="password" class="form-control rounded-0 @error('password') is-invalid @enderror" placeholder="Masukan Password" value="{{ request('password') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="lahir" class="form-label">Tgl lahir</label>
                                    <input type="date" id="lahir" name="lahir" class="form-control rounded-0 @error('lahir') is-invalid @enderror" placeholder="Masukan Tgl lahir" value="{{ request('lahir') }}">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="kelamin" class="form-label">Jenis kelamin</label>
                                    <select id="kelamin" name="kelamin" class="form-control rounded-0 @error('kelamin') is-invalid @enderror">
                                        <option value="">Pilih</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>

                                @if (Crypt::decrypt($level) == 'Klien')
                                <div class="form-outline mb-4">
                                    <label for="daerah" class="form-label">Alamat</label>
                                    <input type="text" name="daerah" id="Daerah" class="form-control rounded-0 @error('daerah') is-invalid @enderror" placeholder="Alamat perusahaan atau usaha" value="{{ request('daerah') }}">
                                </div>      
                                @else
                                    <div class="form-outline mb-4">
                                        <label for="Daerah" class="form-label">Daerah</label>
                                        <select id="Daerah" name="daerah" class="form-control rounded-0 @error('daerah') is-invalid @enderror">
                                            <option value="">Pilih</option>
                                            @foreach ($daerah as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option> 
                                            @endforeach
                                        </select>
                                    </div>      
                                @endif

                                <div class="form-outline mb-4">
                                    <label for="notlp" class="form-label">Telepon</label>
                                    <input type="text" name="notlp" id="notlp" class="form-control rounded-0 @error('notlp') is-invalid @enderror" placeholder="Masukan notlp" value="{{ request('notlp') }}">
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="Foto" class="form-label">Foto profile</label>
                                    <input type="file" id="Foto" name="image" class="form-control rounded-0 @error('image') is-invalid @enderror" placeholder="Masukan foto" value="{{ request('image') }}">
                                </div>

                                <!-- Submit button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary rounded-0" type="submit">DAFTAR</button>
                                </div>
                
                                <!-- Register buttons -->
                                <div class="text-center">
                                <p>atau sudah terdaftar <a href="/">login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    {{-- botstrap JS --}}
    <script src="{{ URL::asset('../bootstrap/JS/bootstrap.bundle.min.js')}}"></script>
</body>
</html>