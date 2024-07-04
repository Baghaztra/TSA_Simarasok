@extends('admin.layout.main')

@section('header')    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Edit Berita</h1>
</div>
@endsection

@section('content')
    <div class="col-6">
        <a href="/admin/post" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category" class="form-control @error('category') is-invalid @enderror" id="">
                    @php
                        $kategoris = [
                            'Hard News',
                            'Soft News',
                            'Feature',
                        ];
                    @endphp
                    @foreach ($kategoris as $item)
                        <option value="{{ $item }}" @if (old('category', $post->category) == $item) selected @endif>
                            {{ $item }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Media</label>
                <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="previewFiles(event)" accept=".jpg, .jpeg, .png, .mp4, .mkv" hidden multiple>
                <div id="preview-container">
                    <!-- Pratinjau media yang ada -->
                    @foreach($post->media as $media)
                    <div style="position: relative; display: inline-block;" data-media-id="{{ $media->id }}">
                        @if($media->tipe === 'gambar')
                        <img src="/media/{{ $media->nama }}" class="img-thumbnail" style="width: 300px; display: block;">
                        @elseif($media->tipe === 'video')
                        <video src="/media/{{ $media->nama }}" class="img-thumbnail" style="width: 300px; display: block;" controls></video>
                        @endif
                        <button onclick="removeExistingMedia({{ $media->id }})" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.8); border: none; border-radius: 50%; cursor: pointer;">&#x2715;</button>
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
                    updatePreview();
                    updateFileInput(currentFiles);
                };
            
                const updatePreview = () => {
                    const previewContainer = document.getElementById('preview-container');
                    
                    // Hapus pratinjau file yang baru ditambahkan saja (biarkan media yang ada tetap)
                    previewContainer.querySelectorAll('[data-new]').forEach(el => el.remove());
                    
                    currentFiles.forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = () => {
                            let mediaElement;
                            const previewWrapper = document.createElement('div');
                            previewWrapper.style.position = 'relative';
                            previewWrapper.style.display = 'inline-block';
                            previewWrapper.dataset.new = true; // Menandai sebagai media baru
                            
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
                                removeButton.style.backgroundColor = 'rgba(255, 255, 255, 0.8)';
                                removeButton.style.border = 'none';
                                removeButton.style.borderRadius = '50%';
                                removeButton.style.cursor = 'pointer';
                                removeButton.addEventListener('click', () => {
                                    currentFiles = currentFiles.filter((_, i) => i !== index);
                                    updatePreview();
                                    updateFileInput(currentFiles);
                                });
            
                                previewWrapper.appendChild(mediaElement);
                                previewWrapper.appendChild(removeButton);
                                previewContainer.appendChild(previewWrapper);
                            }
                        }
                        reader.readAsDataURL(file);
                    });
                };
            
                const updateFileInput = (updatedFiles) => {
                    const dataTransfer = new DataTransfer();
                    updatedFiles.forEach(file => dataTransfer.items.add(file));
                    document.getElementById('gambar').files = dataTransfer.files;
                };
            
                const removeExistingMedia = (id) => {
                    const mediaElement = document.querySelector(`[data-media-id='${id}']`);
                    if (mediaElement) {
                        mediaElement.remove();
                        fetch(`/media/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                          .then(data => {
                              if (data.success) {
                                  console.log('Media deleted successfully');
                              } else {
                                  console.error('Failed to delete media');
                              }
                          })
                          .catch(error => console.error('Error:', error));
                    }
                };
            </script>       

            <div class="mb-3">
                <label class="form-label">Konten</label>
                <div id="editor">
                    {!! old('content', $post->content) !!}
                </div>
                <textarea id="content" name="content" style="display:none;"></textarea>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            const isiBeritaTextarea = document.querySelector('#content');
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
           
            <div class="mb-3 ms-3">
                <div class="form-check form-switch @error('status') is-invalid @enderror">
                    <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" {{ $post->status == 'publish' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status"> Publish</label>
                </div>
                @error('status')
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
