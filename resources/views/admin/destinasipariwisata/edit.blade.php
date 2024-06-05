@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Destinasi Pariwisata</h1>
    </div>
    <div class="col-6">
        <a href="/admin/destinasipariwisata" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/destinasipariwisata/{{ $destinasis->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $destinasis->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">
                    Media
                </label>
                <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="previewFiles(event)" accept=".jpg, .jpeg, .png, .mp4, .mkv" hidden multiple>
                <div id="preview-container">
                    @foreach($destinasis->media as $media)
                    <div class="preview-wrapper" style="position: relative; display: inline-block;">
                        @if($media->tipe = 'gambar')
                            <img src="{{ asset('assets/' . $media->nama) }}" class="img-thumbnail" style="width: 300px; display: block;">
                        @elseif($media->tipe = 'video')
                            <video src="{{ asset('assets/' . $media->nama) }}" class="img-thumbnail" style="width: 300px; display: block;" controls></video>
                        @endif
                        <button type="button" class="remove-existing" data-media-id="{{ $media->id }}" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.8); border: none; border-radius: 50%; cursor: pointer;">&#x2715;</button>
                    </div>
                    @endforeach
                </div>
                <label class="form-label" for="gambar">
                    <div id="img-preview" class="img-thumbnail" style="width: 300px; height: 150px; display: flex; justify-content: center; align-items: center; cursor: pointer; background-color: aliceblue">
                        <i data-feather="plus" style="width: 100px; height: 100px;"></i>
                    </div>
                </label>
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <script>
                    let currentFiles = [];
                    const previewFiles = (event) => {
                        const newFiles = Array.from(event.target.files);
                        currentFiles = currentFiles.concat(newFiles);
                        const previewContainer = document.getElementById('preview-container'); //nyari tempat preview
                        previewContainer.innerHTML = '';
                        // Buat preview
                        currentFiles.forEach((file, index) => {
                            const reader = new FileReader();
                            reader.onload = () => {
                                let mediaElement;
                                const previewWrapper = document.createElement('div');
                                previewWrapper.style.position = 'relative';
                                previewWrapper.style.display = 'inline-block';
                                
                                // kalau gambar preview pake tag img, kalau video pake video
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
                
                                    // Tombol x di pojok kanan
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
                        // masukin anunya ke input gambar (saya malas ubah dari 'gambar' jadi 'media')
                        document.getElementById('gambar').files = dataTransfer.files;
                    }
                </script>  
        
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <div id="editor">
                    {!! old('desc', $destinasis->desc) !!}
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
                    value="{{ old('harga', $destinasis->harga) }}">
                @error('harga')
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
