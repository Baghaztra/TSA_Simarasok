@extends('admin.layout.main')

@section('header')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3 border-bottom">
    <h1 class="h2">Daftar Destinasi Pariwisata</h1>
</div>
@endsection

@section('content')
{{-- <div class="pt-5"></div> --}}
<div class="row pt-3 sticky-top">
    <div class="col-md-6">
        <a href="/admin/destinasipariwisata/create" class="btn btn-primary mb-3">Tambahkan</a>
    </div>
    <div class="col-md-6">
        {{-- Di form ini ganti Button jadi Search & ganti name input jadi q --}}
        <form action="/admin/destinasipariwisata" method="GET" class="input-group mb-3">
            <input type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Cari berdasarkan nama" aria-label="cari sesuatu">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
    </div>
</div>
    @if (session('success') || session('warning') || session('danger'))
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @else
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
    @endif

    <table class="table table-bordered table-striped table-responsive">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga Tiket</th>
            <th>Kunjungan</th>
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
                <td>{{ 'Rp'.number_format($item->harga, 2, ',', '.') }}</td>
                <td>{{ $item->visits }}</td>
                <td>
                    <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')" action="{{ route('destinasipariwisata.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/destinasipariwisata/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#details-modal"
                        data-nama="{{ $item->name }}" 
                        data-desc="{{ $item->desc }}" 
                        data-harga="{{ $item->harga }}"
                        data-gambar="{{ $item->media }}" 
                        data-notelp="{{ $item->notelp }}" 
                        data-lokasi="{{ $item->lokasi }}" 
                        data-status="{{ $item->status }}"
                        data-provider="{{ $item->provider->map(function($provider) {
                            return [
                                'name' => $provider->provider->name,
                                'signal' => $provider->signal,
                            ];
                        })->toJson() }}">
                        Detail
                    </button>

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
                    <div id="media" class="mb-3"></div>
                    <div id="desc" class="mb-3"></div>
                    <p><strong>Harga Tiket : </strong> <span id="harga"></span></p>
                    <p><strong>Contack person : </strong> <span id="notelp"></span></p>
                    <p><strong>Status : </strong><span id="status"></span></p>
                    <u><strong>Kualitas Internet:</strong></u>
                    <ul id="provider" class="mb-3"></ul>
                    <a id="lokasi" href="" target="_blank">Lihat lokasi</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const detailModal = document.getElementById('details-modal');
            detailModal.addEventListener('show.bs.modal', (event) => {
                const button = event.relatedTarget;

                const namaDestinasi = detailModal.querySelector('#nama-destinasi');
                const deskripsi = detailModal.querySelector('#desc');
                const harga = detailModal.querySelector('#harga');
                const notelp = detailModal.querySelector('#notelp');
                const mediaContainer = detailModal.querySelector('#media');
                const lokasi = detailModal.querySelector('#lokasi');
                const status = detailModal.querySelector('#status');
                const provider = detailModal.querySelector('#provider');

                namaDestinasi.innerHTML = button.getAttribute('data-nama');
                deskripsi.innerHTML = button.getAttribute('data-desc');
                harga.innerHTML= parseFloat(button.getAttribute('data-harga')).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 2
                });
                // console.log(fharga);
                notelp.innerHTML = button.getAttribute('data-notelp');
                lokasi.setAttribute('href', button.getAttribute('data-lokasi'));
                status.innerHTML = button.getAttribute('data-status');
                const objectMedia = JSON.parse(button.getAttribute('data-gambar'));
                // console.log(objectMedia);
                mediaContainer.innerHTML = '';
                objectMedia.forEach(item => {
                    // console.log(media);
                    var media;
                    if (item.tipe == 'gambar') {
                        media = document.createElement('img');
                        media.setAttribute('src', "/media/" + item.nama);
                    }else if(item.tipe == 'video'){
                        media = document.createElement('video');
                        media.setAttribute('src', "/media/" + item.nama);
                        media.setAttribute('controls', true);
                    }else if(item.tipe == 'youtube'){
                        const videoId = item.nama.split('v=')[1] || item.nama.split('/').pop();
                        media = document.createElement('iframe');
                        media.src = `https://www.youtube.com/embed/${videoId}`;
                        media.frameBorder = '0';
                        media.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
                        media.allowFullscreen = true;
                    }else{
                        console.log('Error pada media');
                    }
                    media.classList.add('m-1');
                    media.style.height = '200px';
                    media.setAttribute('src', "/media/" + item.nama);
                    mediaContainer.appendChild(media);
                });
                const listProvider = JSON.parse(button.getAttribute('data-provider'));
                console.log(listProvider);
                provider.innerHTML = '';
                listProvider.forEach(item => {
                    const prov = document.createElement('li');
                    prov.innerHTML = "<strong>"+ item.name +"</strong> : "+item.signal;
                    // console.log(prov);
                    provider.appendChild(prov);
                });
            });
        });
    </script>

@endsection
