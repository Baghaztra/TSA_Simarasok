@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Postingan</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="/admin/post/create" class="btn btn-primary mb-3">Postingan Baru</a>
        </div>
        <div class="col-md-6">
            <form action="/admin/post" method="GET" class="input-group mb-3">
                <input type="text" class="form-control" name="q" value="{{ request('q') }}"
                    placeholder="cari berdasarkan judul" aria-label="cari sesuatu">
                <button class="btn btn-outline-success" type="submit">Search</button>
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

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>judul</th>
            <th>kategori</th>
            <th>status</th>
            <th>action</th>
        </tr>
        @if ($posts->isEmpty())
            <tr>
                <td style="text-align: center; background: rgb(187, 187, 187); color: rgb(41, 41, 41); font-weight: 600"
                    colspan="7">Data
                    not found.
                </td>
            </tr>
        @endif
        @foreach ($posts as $item)
            <tr>
                <td>{{ $posts->firstItem() + $loop->index }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->category }}</td>
                <td>
                    <form action="{{ route('post.toggleStatus', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-check form-switch">
                            <input 
                                class="form-check-input" 
                                type="checkbox" 
                                role="switch" 
                                id="toggleStatus{{ $item->id }}" 
                                name="status" 
                                {{ $item->status == 'publish' ? 'checked' : '' }}
                                onchange="this.form.submit()">
                            <label class="form-check-label" for="toggleStatus{{ $item->id }}">
                                {{ $item->status == 'publish' ? 'Publish' : 'Draft' }}
                            </label>
                        </div>
                    </form>
                </td>
                
                
                <td>
                    <form class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')"
                        action="{{ route('post.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                    <a href="/admin/post/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#details-modal"
                        data-nama="{{ $item->title }}" 
                        data-slug="{{ $item->slug }}" 
                        data-desc="{{ $item->content }}" 
                        data-gambar="{{ $item->media }}" 
                        data-category="{{ $item->category }}" 
                        data-status="{{ $item->status }}"
                    >
                        Detail
                    </button>
                </td>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}

    <!-- Modal -->
    <div class="modal fade" id="details-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5"  id="title"></h1><br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <h7 class="text-secondary"  id="slug"></h7> --}}
                    <div id="media" class="mb-3"></div>
                    <p><strong id="category"></strong></p>
                    <div id="desc" class="mb-3"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const detailModal = document.getElementById('details-modal');
            detailModal.addEventListener('show.bs.modal', (event) => {
                const button = event.relatedTarget;

                const namaDestinasi = detailModal.querySelector('#title');
                const deskripsi = detailModal.querySelector('#desc');
                const category = detailModal.querySelector('#category');
                const mediaContainer = detailModal.querySelector('#media');
                const slug = detailModal.querySelector('#slug');

                namaDestinasi.innerHTML = button.getAttribute('data-nama');
                deskripsi.innerHTML = button.getAttribute('data-desc');
                // console.log(fharga);
                category.innerHTML = button.getAttribute('data-category');
                // slug.innerHTML = button.getAttribute('data-slug');

                const objectMedia = JSON.parse(button.getAttribute('data-gambar'));
                // console.log(objectMedia);
                mediaContainer.innerHTML = '';
                objectMedia.forEach(item => {
                    // console.log(media);
                    var media;
                    if (item.tipe == 'gambar') {
                        media = document.createElement('img');
                    }else{
                        media = document.createElement('video');
                        media.setAttribute('controls', true);
                    }
                    media.classList.add('m-1');
                    media.style.height = '200px';
                    media.setAttribute('src', "/media/" + item.nama);
                    mediaContainer.appendChild(media);
                });
            });
        });
    </script>
@endsection
