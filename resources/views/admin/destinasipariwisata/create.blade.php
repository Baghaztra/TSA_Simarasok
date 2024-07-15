@extends('admin.layout.main')

@section('header')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Destinasi Pariwisata Baru</h1>
</div>
@endsection

@section('content')
    <div class="col-6">
        <a href="/admin/destinasipariwisata" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/destinasipariwisata" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" placeholder="ex. Air terjun XXXX">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Media</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="previewFiles(event)" accept="image/*, video/*" hidden multiple>
                <div id="preview-container"></div>
                <div id="preview-youtube"></div>
                <label class="form-label" for="gambar">
                    <div id="img-preview" class="img-thumbnail" style="width: 300px; height: 150px; display: flex; justify-content: center; align-items: center; cursor: pointer; background-color: aliceblue">
                        <i data-feather="plus" style="width: 100px; height: 100px;"></i>
                    </div>
                </label>
                <div class="input-group mb-3">
                    <input type="text" id="youtube-link" class="form-control" placeholder="Masukkan link YouTube">
                    <button class="btn btn-primary" type="button" onclick="addYouTubeVideo()">Tambahkan</button>
                </div>
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <script>
                    let currentFiles = [];
                    let youtubeLinks = [];   
                    const previewFiles = (event) => {
                        const newFiles = Array.from(event.target.files);
                        currentFiles = currentFiles.concat(newFiles);
                        const previewContainer = document.getElementById('preview-container');
                        previewContainer.innerHTML = '';
                        currentFiles.forEach((file, index) => {
                            const reader = new FileReader();
                            reader.onload = () => {
                                let mediaElement;
                                const previewWrapper = document.createElement('div');
                                previewWrapper.style.position = 'relative';
                                previewWrapper.style.display = 'inline-block';
                                if (file.type.startsWith('image/')) {
                                    mediaElement = document.createElement('img');
                                    mediaElement.src = reader.result;
                                } else if (file.type.startsWith('video/')) {
                                    mediaElement = document.createElement('video');
                                    mediaElement.src = reader.result;
                                    mediaElement.controls = true;
                                }
                                if (mediaElement) {
                                    mediaElement.classList.add('img-thumbnail');
                                    mediaElement.style.width = '300px';
                                    mediaElement.style.display = 'block';
                                    const removeButton = document.createElement('button');
                                    removeButton.innerHTML = '&#x2715;';
                                    removeButton.style.position = 'absolute';
                                    removeButton.style.top = '5px';
                                    removeButton.style.right = '5px';
                                    removeButton.style.backgroundColor = 'rgba(255, 0, 0, 0.5)';
                                    removeButton.style.width = '26px';
                                    removeButton.style.height = '26px';
                                    removeButton.style.border = 'none';
                                    removeButton.style.borderRadius = '50%';
                                    removeButton.style.cursor = 'pointer';
                                    removeButton.addEventListener('click', () => {
                                        previewWrapper.remove();
                                        currentFiles.splice(index, 1);
                                        updateFileInput(currentFiles);
                                    });
                                    previewWrapper.appendChild(mediaElement);
                                    previewWrapper.appendChild(removeButton);
                                    previewContainer.appendChild(previewWrapper);
                                }
                            }
                            reader.readAsDataURL(file);
                        });
                        updateFileInput(currentFiles);
                    };
                
                    const updateFileInput = (updatedFiles) => {
                        const dataTransfer = new DataTransfer();
                        updatedFiles.forEach(file => dataTransfer.items.add(file));
                        document.getElementById('gambar').files = dataTransfer.files;
                    }
                
                    const addYouTubeVideo = () => {
                        const link = document.getElementById('youtube-link').value;
                        const videoId = link.split('v=')[1] || link.split('/').pop();
                        youtubeLinks.push(link);
                        const previewContainer = document.getElementById('preview-youtube');
                        const iframe = document.createElement('iframe');
                        iframe.width = '300';
                        iframe.height = '150';
                        iframe.src = `https://www.youtube.com/embed/${videoId}`;
                        iframe.frameBorder = '0';
                        iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
                        iframe.allowFullscreen = true;
                        
                        const previewWrapper = document.createElement('div');
                        previewWrapper.style.position = 'relative';
                        previewWrapper.style.display = 'inline-block';
                        
                        const removeButton = document.createElement('button');
                        removeButton.innerHTML = '&#x2715;';
                        removeButton.style.position = 'absolute';
                        removeButton.style.top = '5px';
                        removeButton.style.right = '5px';
                        removeButton.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                        removeButton.style.border = 'none';
                        removeButton.style.borderRadius = '50%';
                        removeButton.style.cursor = 'pointer';
                        removeButton.addEventListener('click', () => {
                            previewWrapper.remove();
                            const index = youtubeLinks.indexOf(link);
                            if (index > -1) {
                                youtubeLinks.splice(index, 1);
                            }
                        });
                
                        previewWrapper.appendChild(iframe);
                        previewWrapper.appendChild(removeButton);
                        previewContainer.appendChild(previewWrapper);
                
                        document.getElementById('youtube-links').value = JSON.stringify(youtubeLinks);
                        document.getElementById('youtube-link').value = '';
                    };
                </script>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi destinasi</label>
                <div id="editor">
                    {!! old('desc') !!}
                </div>
                <textarea id="desc" name="desc" style="display:none;"></textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            const isiBeritaTextarea = document.querySelector('#desc');
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
                <label class="form-label">Harga Tiket</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                    value="{{ old('harga') }}" placeholder="Masukkan angka saja, tanpa titik dan sebagainya">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Contact person</label>
                <input type="text" class="form-control @error('notelp') is-invalid @enderror" name="notelp"
                    value="{{ old('notelp') }}" placeholder="ex: +628XXXXXXXXXX">
                @error('notelp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Link lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi"
                    value="{{ old('lokasi') }}">
                @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status Destinasi</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="normal" {{ old('status') == 'normal' ? 'selected' : '' }}>Normal</option>
                    <option value="perbaikan" {{ old('status') == 'perbaikan' ? 'selected' : '' }}>Sedang Perbaikan</option>
                    <option value="ditutup" {{ old('status') == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kecepatan Internet</label>
                @foreach ($providers as $item)
                    <div class="input-group row mb-1">
                        <label class="form-label col-4">{{ $item->name }}</label>
                        <select class="form-select col-8 @error('providers') is-invalid @enderror" name="providers[]">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="Very Good" {{ old('providers.' . $loop->index) == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                            <option value="Good" {{ old('providers.' . $loop->index) == 'Good' ? 'selected' : '' }}>Good</option>
                            <option value="Normal" {{ old('providers.' . $loop->index) == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Fair" {{ old('providers.' . $loop->index) == 'Fair' ? 'selected' : '' }}>Fair</option>
                            <option value="Bad" {{ old('providers.' . $loop->index) == 'Bad' ? 'selected' : '' }}>Bad</option>
                        </select>
                    </div>
                @endforeach
                @error('providers')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            <div style="height: 25vh"></div>
        </form>
    </div>
@endsection
