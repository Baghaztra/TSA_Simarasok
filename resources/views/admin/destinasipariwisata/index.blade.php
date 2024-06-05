@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Destinasi Pariwisata</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="/admin/destinasipariwisata/create" class="btn btn-primary mb-3">Entri Data Destinasi Pariwisata</a>
        </div>
        <div class="col-md-6">
            <form action="/admin/destinasipariwisata" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" name="query" value="" placeholder="cari sesuatu" aria-label="cari sesuatu">
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
            <th>Nama</th>
            <th>Harga Tiket</th>
            <th>Aksi</th>
        </tr>
        @if ($destinasis->isEmpty())
            <tr>
                <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600" colspan="7">Data not found.</td>
            </tr>
        @endif
        @foreach ($destinasis as $item)
            <tr>
                <td>{{ $destinasis->firstItem() + $loop->index }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->harga }}</td>
                <td>
                    <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')" action="{{ route('destinasipariwisata.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/destinasipariwisata/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#details-modal" 
                    data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-item="{{ htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') }}">Detail</button>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $destinasis->links() }}

    <!-- Modal -->
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"  id="nama-destinasi"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <p><strong>Deskripsi:</strong> <span id="desc"></span></p>
                    <p><strong>Harga Tiket:</strong> <span id="harga"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const exampleModal = document.getElementById('exampleModal');
            exampleModal.addEventListener('show.bs.modal', (event) => {
                const button = event.relatedTarget;
                const itemData = button.getAttribute('data-item');
                const item = JSON.parse(itemData);
    
                const namaDestinasi = exampleModal.querySelector('#nama-destinasi');
                const deskripsi = exampleModal.querySelector('#desc');
                const modalHarga = exampleModal.querySelector('#harga');
    
                namaDestinasi.textContent = item.name;
                deskripsi.textContent = item.desc;
                modalHarga.textContent = item.harga;
            });
        });
    </script>
    
@endsection
