@extends('dashboard.layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-body px-4">
            <div class="d-flex justify-content-between col-lg">
            <h1 class="mt-2 mb-4">Edit Kategori</h1>
                <div class="mt-3">
                    <a href="/dashboard/kategori" class="btn btn-transparent text-primary mb-2">
                        <i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <div class="col-lg">
                @if (Session::get('info'))
                  <div class="alert alert-info">{{ Session::get('info') }}</div>
                  @elseif ($errors->any())
                  <div class="alert alert-danger">{{ Session::get('Edit kategori Gagal..') }}</div>
                    
                @endif

                <form action="/dashboard/kategori/{{ $data->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="kategori" name="nama" value="{{ old('nama', $data->nama) }}" onkeyup="getSlug()">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $data->slug) }}" readonly>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    @error('deskripsi')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-save"></i> Update</button>
                </form>
            </div>
        </div>
    </div>  
</div>

<script>  
    function getSlug(){
        $.get('{{ url('/slug-kategori') }}', {'kategori': $('#kategori').val()},
         function (data){
             $('#slug').val(data.slug)
            }
        )
    }
</script>
@endsection

