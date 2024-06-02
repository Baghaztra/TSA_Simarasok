@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Create Kategori</h1>
    </div>
    <div class="col-6">
        <a href="/admin/category" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/category" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Jennis Kategori</label>
                <select id="inputGroupSelect01" class="form-control @error('jenis') is-invalid @enderror" name="jenis"
                    value="">
                    <option value>--- Pilih Jenis Kategori ---</option>
                    <option value="Berita">Berita</option>
                    <option value="UMKM">UMKM</option>
                    @error('jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </select>
            </div>

            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            <div style="height: 25vh"></div>
        </form>
    </div>
@endsection
