@extends('dashboard.layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-body px-4">
            <h1 class="mt-2 mb-4">Profile Penulis</h1>
            <div class="col-lg">
                @if (Session::get('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                @endif
                <form action="/dashboard" method="POST" enctype="multipart/form-data" class="mb-5">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-3 pe-5">
                                <label for="foto" class="form-label">Foto</label>
                    <input type="hidden" value="{{ auth()->user()->foto }}" name="fotoLama">
                    @if (auth()->user()->foto)
                        <img src="{{ asset('images/' . auth()->user()->foto) }}" class="img-fluid tampil-gamabr mb-3 d-block col-sm-5" alt="">
                    @else
                    <img src="" alt="" class="img-fluid tampil-gambar mb-3 col-sm-5">
                    @endif
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto"
                     id="gambar" onchange="tampilGambar()">
                    @error('foto')
                      <div class="invalid-feedback">
                          {{ $message }}
                       </div>
                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-7 border-start ps-5">
                            <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                             id="name" value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                               </div>
                            @enderror
                        </div>
                            <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                             id="email" value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                              <div class="invalid-feedback">
                                  {{ $message }}
                               </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                        <label for="telpon" class="form-label">Telpon</label>
                        <input type="text" class="form-control @error('telpon') is-invalid @enderror" name="telpon"
                         id="telpon" value="{{ old('telpon', auth()->user()->telpon) }}">
                        @error('telpon')
                          <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                    </div>
                </div>
            </div>
                <div class="mb-3 mt-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="2" class="form-control @error('alamat') 
                        is-invalid @enderror">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>       
                <div class="mb-3">
                        <label for="keahlian" class="form-label">Keahlian (pisahkan dengan koma)</label>
                        <input type="text" class="form-control @error('keahlian') 
                        is-invalid @enderror" id="tokenfield" name="keahlian" value="{{ old('keahlian', auth()->user()->keahlian) }}">
                        @error('keahlian')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>       
                <div class="mb-3">
                    <label for="words" class="form-label">Words</label>
                    @error('words')    
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                       <textarea name="words" id="editor">{{ old('words', auth()->user()->words) }}</textarea>
                    </div>       
                    <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>  
</div>
@endsection

