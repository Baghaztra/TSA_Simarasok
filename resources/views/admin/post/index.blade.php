@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Berita</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="/admin/post/create" class="btn btn-primary mb-3">Entri Data Berita</a>
        </div>
        <div class="col-md-6">
            <form action="/admin/berita" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" name="query" value=""
                    placeholder="cari sesuatu" aria-label="cari sesuatu">
                <button class="btn btn-outline-success" type="submit">Button</button>
            </form>
        </div>
    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>isi</th>
            <th>kategori</th>
            <th>author</th>
            <th>gambar</th>
            <th>action</th>
        </tr>
        @if ($beritas->isEmpty())
            <tr>
                <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600"
                    colspan="7">Data
                    not found.
                </td>
            </tr>
        @endif
        @foreach ($beritas as $item)
            <tr>
                <td>{{ $beritas->firstItem() + $loop->index }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->isi_berita }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->author->name }}</td>
                <td>{{ $item->gambar }}</td>
                <td>
                    <form class="d-inline" onsubmit="return confirm('yakin inging mengapus data ini')"
                        action="/admin/berita/{{ $item->id }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/post/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $beritas->links() }}
@endsection
