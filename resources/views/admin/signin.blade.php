<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
 <div class="row justify-content-center">
    <div class="col-4">
        <main class="form-signin w-100 m-auto">
            <form action="{{ route('proses-signin') }}" method="POST" autocomplete="off">
                @csrf
                <h1 class="h3 my-3 fw-normal">Please sign in</h1>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                        name="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="floatingInput">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" name="remember" value="remember-me"
                        id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-body-secondary text-center">&copy; {{ date('Y') }}</p>
            </form>
        </main>
    </div>
 </div>

 <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
