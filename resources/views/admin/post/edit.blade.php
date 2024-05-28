@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Dosen</h1>
    </div>
    <div class="col-6">
        <a href="/dashboard-dosen" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/dashboard-dosen/{{ $dosen->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">NIK</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"
                    value="{{ old('nik', $dosen->nik) }}" readonly>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Dosen</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                    value="{{ old('nama', $dosen->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $dosen->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp"
                    value="{{ old('no_telp', $dosen->no_telp) }}">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Prodi</label>
                <select name="prodi_id" class="form-control @error('prodi_id') is-invalid @enderror" id="">
                    @foreach ($prodis as $item)
                        <option value="{{ $item->id }}" @if (old('prodi_id', $dosen->prodi_id) == $item->id) selected @endif>
                            {{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('prodi_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $dosen->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-sm btn-primary" type="submit">Update</button>
        </form>
    </div>
@endsection
