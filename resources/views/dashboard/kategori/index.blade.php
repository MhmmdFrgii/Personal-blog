@extends('dashboard.layout.main')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-3">
        <div class="card-body px-4">
            <div class="d-flex justify-content-between col-lg">
            <h1 class="mt-2 mb-4">Kategori</h1>
            </div>

            @if (Session('info'))
                <div class="alert alert-info">
                    {{ Session::get('info') }}
                </div>
            @endif

            <a href="/dashboard/kategori/create" class="btn btn-outline-primary mb-3"><i class="fa fa-plus"></i> Kategori Baru</a>

            <table class="table table-hover table-sm" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nana Kategori</th>
                        <th>Deskripsi</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $category->nama }}</td>
                            <td>{{ $category->deskripsi }}</td>
                            <td class="col-1">
                                <a href="/dashboard/kategori/{{ $category->id }}/edit" class="btn btn-warning btn-sm" title="edit kategori"><i class="fa fa-pen"></i></a>
                                <form action="/dashboard/kategori/{{ $category->id }}" method="post" class="d-inline" onsubmit="return confirm ('Anda yakin ingin menghapus kategori ini ?')">
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

