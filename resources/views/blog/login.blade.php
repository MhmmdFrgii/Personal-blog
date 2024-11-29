@extends('blog.layout.main')

@section('content')

<div class="row justify-content-center mt-5 mb-3">
    <div class="col-lg-4">
        <form action="/login" method="post">
            @csrf
            <div class="px-2 text-center">
                <img src="{{ asset('blog') }}/assets/write.png" alt="" class="mt-2">
                <h3 class="mt-2">{{config ('app.name')}}</h3>
                @if (session()->has('Gagal'))
                    <div class="alert alert-danger text-start mt-3">
                        {{ session('Gagal') }}
                    </div>
                @endif
                <input type="email" name="email" class="form-control rounded py-2 px-3 mt-4 @error('email') 
                is-invalid @enderror" value="{{ old('email') }}" placeholder="masukan email anda!">
                @error('email')
                <div class="invalid-feedback text-start ps-3">
                    {{ $message }}
                </div>
                @enderror
                
                <input type="password" name="password" class="form-control rounded py-2 px-3 mt-4 @error('password') 
                is-invalid @enderror" placeholder="masukan password anda!">
                @error('password')
                <div class="invalid-feedback text-start ps-3">
                    {{ $message }}
                </div>
                @enderror
                <div class="d-grid mb-3">
                    <button type="submit" name="submit" class="btn btn-primary rounded mt-4">Login</button>
                </div>
                <hr class="mb-5">
            </div>
        </form>
    </div>
</div>
    
@endsection