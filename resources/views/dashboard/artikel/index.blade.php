@extends('dashboard.layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-body px-4">
            <div class="d-flex justify-content-between col-lg">
            <h1 class="mt-2 mb-4">Artikel</h1>
            </div>

            @if (Session('info'))
                <div class="alert alert-info">
                    {{ Session::get('info') }}
                </div>
            @endif

            <a href="/dashboard/artikel/create" class="btn btn-outline-primary mb-3"><i class="fa fa-plus"></i> Artikel Baru</a>

            <table class="table table-hover table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Tag</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $article->judul }}</td>
                            <td>{{ $article->category->nama }}</td>
                            <td>
                                @foreach ($article->tags as $tag)
                                <button class="btn btn-sm btn-outline-dark mb-1" type="button">
                                    {{ $tag->name }}
                                </button>
                                @endforeach
                            </td>
                            <td>
                                <a href="/dashboard/artikel/{{ $article->id }}/edit" class="btn btn-warning btn-sm" title="edit kategori"><i class="fa fa-pen"></i></a>
                                <form action="/dashboard/artikel/{{ $article->id }}" method="post" class="d-inline" onsubmit="return confirm ('Anda yakin ingin menghapus artikel ini ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="hapus kategori"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>  
</div>
@endsection

