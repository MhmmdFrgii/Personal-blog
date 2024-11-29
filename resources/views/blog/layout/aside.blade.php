  <!-- Side widgets-->
  <div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4 border-0">
        <div class="card-header bg-transparent fw-bold fs-5" style="border-bottom: 2px solid black">Pencarian</div>
        <div class="card-body">
            <form action="/artikel">
            <div class="input-group">
                <input type="text" name="cari" class="form-control border-0 border-bottom rounded-0"
                placeholder="Masukkan kata kunci pencarian">
                <button type="submit" class="btn btn-light border-bottom"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4 border-0">
        <div class="card-header bg-transparent fw-bold fs-5" style="border-bottom: 2px solid black">Kategori</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    @foreach ($categories as $category)      
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">
                            <a href="/artikel?kategori={{ $category->slug }}" class="text-decoration-none text-dark link-primary d-grid d-flex justify-content-between"><span>{{ $category->nama }}</span><span>
                                @if ($category->articles->count())
                                    {{ $category->articles->count() }}
                                @endif
                            </span></a>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
<!-- Side widget-->
<div class="card mb-4 border-0">
    <div class="card-header bg-transparent fw-bold fs-5" 
    style="border-bottom: 2px solid black">{{ $label }}</div>
    <div class="card-body">
        @foreach ($views as $view)
        <div class="row mb-3">
            <div class="col-4">
                <a href="/artikel/{{ $view->slug }}"><img src="{{ asset('images/'.$view->gambar) }}" class="img-fluid rounded-0" alt=""></a>
            </div>
            <div class="col-8">
                <a href="/artikel/{{ $view->slug }}" class="text-dark text-decoration-none h6 d-block">
                {{ $view->judul }}</a>
                <small class="text-muted">
                    {{ $view->created_at->format('d F Y') }}
                </small>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>