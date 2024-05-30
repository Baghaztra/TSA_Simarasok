@extends('admin.layout.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Edit User</h1>
    </div>
    <div class="col-6">
        <a href="/admin/user" class="btn btn-sm btn-warning mb-3">Kembali</a>
        <form action="/admin/users/{{ $users->id }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name', $users->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email', $users->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label">Reset Password?</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="resetPasswordToggle" data-bs-toggle="collapse" data-bs-target="#newPasswordContainer">
                    <label class="form-check-label" for="resetPasswordToggle">
                        Yes, reset password
                    </label>
                </div>
            </div>
            
            <div class="mb-3 collapse" id="newPasswordContainer">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                @error('new_password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <script>
                var resetPasswordToggle = document.getElementById('resetPasswordToggle');
                var newPasswordContainer = document.getElementById('newPasswordContainer');
            
                resetPasswordToggle.addEventListener('change', function() {
                    if (resetPasswordToggle.checked) {
                        newPasswordContainer.classList.remove('collapse');
                    } else {
                        newPasswordContainer.classList.add('collapse');
                    }
                });
            </script>
            

            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            <div style="height: 25vh"></div>
        </form>
    </div>
@endsection