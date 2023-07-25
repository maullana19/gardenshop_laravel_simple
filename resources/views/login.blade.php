<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GARDENINGS - Login</title>
    {{-- BOOTSTRAP --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-success bg-opacity-75">
    <main class="form-signin w-50 m-auto p-4">
        <form class="bg-light p-4 rounded shadow-sm" action="{{ route('login_credentials') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal mb-2">Silahkan Login</h1>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" id="floatingInput" name="email"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-floating mb-2">
                <input type="password" class="form-control" id="floatingPassword" name="password"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            @error('password')
                <small>{{ $message }}</small>
            @enderror
            <hr />
            <button class="w-100 btn  btn-success" type="submit">Login</button>
            <div class="mt-3 text-center">

                <p>-- atau -- </p>

                <a href="/register">Daftar</a>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2023 | GardenShop</p>
        </form>
    </main>
    {{-- BOOTSTRAP JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- SWEETALERT 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}')
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
            })
        </script>
    @endif
</body>

</html>
