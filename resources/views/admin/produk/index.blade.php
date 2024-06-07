@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Produk</h1>
    </div>
    <a href="/admin/umkm/" class="btn btn-sm btn-warning mb-3">Kembali</a>
    <div class="row" style="width: 100%">
        <div class="col-md-6">
            <form action="/admin/produk/create" method="get">
                <input type="hidden" name="umkm_id" value="{{ $umkm_id }}">
                <button class="btn btn-primary mb-3" type="submit">Entri Data Produk</button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="/admin/produk/{{ $umkm_id }}" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" name="query" value="{{ $q }}"
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

    <table class="table table-bordered table-striped table-responsive" style="width: 100%">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        @if ($produks->isEmpty())
            <tr>
                <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600"
                    colspan="5">Data
                    not found.
                </td>
            </tr>
        @endif
        @foreach ($produks as $item)
            <tr>
                <td>{{ $produks->firstItem() + $loop->index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->desc }}</td>
                <td>{{ 'Rp'.number_format($item->harga, 2, ',', '.') }}</td>
                <td>
                    <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                        action="{{ route('produk.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/produk/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $produks->links() }}
@endsection
