@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit Berita</h1>
    </div>
    <div class="col-6">
        <a href="/admin/post" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/post/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    value="{{ old('judul', $post->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">
                    Media
                    <img src="/images/upload.jpg" class="img-thumbnail" id="img-preview" style="width: 300px; display: block;">
                </label>
                <input type="file" name="gambar[]" id="gambar" class="form-control @error('gambar') is-invalid @enderror" onchange="previewFiles(event)" accept="image/*, video/*" multiple>
                <div id="preview-container">
                    @foreach($post->media as $media)
                    <div class="preview-wrapper" style="position: relative; display: inline-block;">
                        @if($media->tipe = 'gambar')
                            {{-- @dd($media->nama) --}}
                            <img src="{{ asset('images/' . $media->nama) }}" class="img-thumbnail" style="width: 300px; display: block;">
                        @elseif($media->tipe = 'video')
                            {{-- @dd($media->nama) --}}
                            <video src="{{ asset('images/' . $media->nama) }}" class="img-thumbnail" style="width: 300px; display: block;" controls></video>
                        @endif
                        <button type="button" class="remove-existing" data-media-id="{{ $media->id }}" style="position: absolute; top: 5px; right: 5px; background-color: rgba(255, 255, 255, 0.8); border: none; border-radius: 50%; cursor: pointer;">&#x2715;</button>
                    </div>
                    @endforeach
                </div>
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <script>
                const previewFiles = (event) => {
                    const files = Array.from(event.target.files);
                    const previewContainer = document.getElementById('preview-container');
                    const imgPreview = document.getElementById('img-preview');
                    
                    // Hide the initial image preview
                    if (files.length > 0) {
                        imgPreview.style.display = 'none';
                    }
            
                    files.forEach((file, index) => {
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
            
                                // Create remove button
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
                                    files.splice(index, 1);
                                    updateFileInput(files);
                                });
            
                                previewWrapper.appendChild(mediaElement);
                                previewWrapper.appendChild(removeButton);
                                previewContainer.appendChild(previewWrapper);
                            }
                        }
                        reader.readAsDataURL(file);
                    });
            
                    const updateFileInput = (updatedFiles) => {
                        const dataTransfer = new DataTransfer();
                        updatedFiles.forEach(file => dataTransfer.items.add(file));
                        document.getElementById('gambar').files = dataTransfer.files;
                        if (dataTransfer.files.length === 0) {
                            imgPreview.style.display = 'block';
                        }
                    }
                };
            
                document.querySelectorAll('.remove-existing').forEach(button => {
                    button.addEventListener('click', () => {
                        const mediaId = button.getAttribute('data-media-id');
                        const wrapper = button.closest('.preview-wrapper');
            
                        fetch(`/media/${mediaId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                wrapper.remove();
                            }
                        });
                    });
                });
            </script>
            

            <div class="mb-3">
                <label class="form-label">Isi</label>
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

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="">
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}" @if (old('category_id',$post->category_id) == $item->id) selected @endif>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
           
            <div class="mb-3">
                <div class="form-check form-switch @error('publish') is-invalid @enderror">
                    <input class="form-check-input" type="checkbox" role="switch" id="publish" name="publish" {{ $post->status == 'publish' ? 'checked' : '' }}>
                    <label class="form-check-label" for="publish">Lansung Publish</label>
                </div>
                @error('publish')
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
