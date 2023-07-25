<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GARDENINGS - Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-success bg-opacity-75">
    <main class="form-signin w-50 m-auto p-4">
        <form class="bg-light p-4 rounded shadow-sm" action="{{ route('register_credentials') }}" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Please Register</h1>

            <div class="form-floating mb-2">
                <input type="username" class="form-control" name="name" id="floatingInput" placeholder="username">
                <label for="floatingInput">username</label>
            </div>

            <div class="form-floating mb-2">
                <input type="email" class="form-control" name="email" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" class="form-control" name="password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <hr />
            <button class="w-100 btn  btn-success" type="submit">Register</button>
            <div class="mt-3 text-center">
                <p>sudah punya akun?</p>
                <a href="/login">Login</a>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2023 | Gardenings</p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
