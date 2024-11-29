 <!-- Page header with logo and tagline-->
 <header class="border-bottom mb-4">
    <div class="container-fluid px-0">

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('images/' . $slides[0]->gambar) }}" class="d-block w-100" height="400px">
                <div class="carousel-caption d-md-block" style="top: 120px; z-index: 1;">
                    <h1 class="fw-bolder">{{ $slides[0]->judul }}</h1>
                    {!! $slides[0]->kutipan !!}
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $slides[1]->gambar) }}" class="d-block w-100" height="400px">
                <div class="carousel-caption d-md-block" style="top: 120px; z-index: 1;">
                    <h1 class="fw-bolder">{{ $slides[1]->judul }}</h1>
                    {!! $slides[1]->kutipan !!}
                </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/' . $slides[2]->gambar) }}" class="d-block w-100" height="400px">
                <div class="carousel-caption d-md-block" style="top: 120px; z-index: 1;">
                    <h1 class="fw-bolder">{{ $slides[2]->judul }}</h1>
                    {!! $slides[2]->kutipan !!}
                </div>
              </div>
            </div>
          </div>
    </div>
</header>