{{-- @extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Create UMKM</h1>
    </div>
    <div class="col-6">
        <a href="/admin/post" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/post" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    value="{{ old('judul') }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">
                    Gambar
                    <img src="/images/upload.jpg" class="img-thumbbnail" id="img-preview"
                        style="width: 300px; display: block;">
                </label>
                <input type="file" name="gambar" id="gambar" hidden class="form-control @error('gambar') is-invalid @enderror" onchange="priviewImage(event)" accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <script>
                    const priviewImage = (event)=>{
                        const reader = new FileReader();
                        reader.onload = ()=>{
                            document.getElementById('img-preview').src = reader.result;
                        }
                        reader.readAsDataURL(event.target.files[0]);
                    };
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi</label>
                <div id="editor">
                    {!! old('isi_berita') !!}
                </div>
                <textarea id="isi_berita" name="isi_berita" style="display:none;"></textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            const isiBeritaTextarea = document.querySelector('#isi_berita');
                            editor.model.document.on('change:data', () => {
                                isiBeritaTextarea.value = editor.getData();
                            });
                            const form = isiBeritaTextarea.closest('form');
                            form.addEventListener('submit', () => {
                                isiBeritaTextarea.value = editor.getData();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}" @if (old('category_id') == $item->id) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            <div style="height: 25vh"></div>
        </form>
    </div>
@endsection
 --}}
