<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} - {{ config('app.name') }}</title>

    <!-- Import bootstrap CSS -->
    {{-- link rel untuk memanggil css --}}
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
</head>
{{-- body adalah wadah untuk menampilkan conten --}}

<body>
    {{-- include di gunakan untuk mengambil pungsi pungsi komponen yang ada di dalam polder partial/napbar --}}
    {{-- body adalah wadah untuk menampilkan conten --}}
    @include('partials.navbar') <!-- Mengambil component navbar -->

    @yield('content') <!-- Render content -->
    {{-- yield di gunakan untuk mendefinisikan tempat(section)didalam sebuah layout --}}
    @include('partials.modal')
    {{-- ingklud di gunakan untuk mengambil pungsi pungsi komponen yang ada di dalam polder partial/napbar --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import bootstrap JS -->
    {{-- scrip untuk memanggil js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
