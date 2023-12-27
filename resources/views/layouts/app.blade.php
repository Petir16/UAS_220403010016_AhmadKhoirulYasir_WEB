<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body style="padding: 4em">
    <nav>
        <ul style="list-style-type: none;  list-style-position: inside; padding-left:0;">
            <li><a href="/">Home</a></li>
            <li><a href="{{route ('mahasiswa.create')}}">Tambah mahasiswa</a></li>
            <li><a href="{{route('mahasiswa.index')}}">Mahasiswa</a></li>
        </ul>
    </nav>
    <main style="padding: 0em 2em">
        @yield('content')
    </main>
    <footer>
        <p>Copyleft &copy; 2023 praktikum Web lanjut Universitas PGRI Kanjuruhan malang</p>
    </footer>
</body>
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
</html>
