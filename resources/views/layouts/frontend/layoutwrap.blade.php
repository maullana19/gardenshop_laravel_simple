<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- BOOTSTRAP 5 CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Gshop - @yield('title')</title>
</head>

{{-- =============== LAYOUTS =================== --}}

<body>


    {{-- =============== HEADER ==================== --}}
    <header>
        @include('layouts/frontend/components/navbars')
    </header>

    {{-- =============== CONTENT ==================== --}}
    <section>
        @yield('content')
    </section>

    {{-- ================ FOOTER ==================== --}}
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Hak Cipta @GardenShop. 2023</span>
        </div>
    </footer>

    {{-- BOOSTRAP JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    {{-- SWEETALERT 2 NOTIFICATION --}}
    @if ($message = Session::get('success'))
        <script>
            Swal.fire('{{ $message }}')
        </script>
    @endif
</body>

</html>
