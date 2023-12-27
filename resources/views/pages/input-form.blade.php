@extends('layouts.app')

@section('content')
    @if (!$mahasiswa)
        <h2>Input Data Diri</h2>
        <div>
            <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <label for="nama">Masukkan nama anda : </label>
                <input type="text" id="nama" name="nama" placeholder="ex. jhon"> <br><br>
                <label for="nim">Masukkan nomer induk mahasiswa anda : </label>
                <input type="text" id="nim" name="nim"placeholder="ex. 2134"> <br><br>
                <label for="prodi">Masukkan program studi anda : </label>
                <input type="text" id="prodi" name="prodi"placeholder="ex. teknik informatika"><br><br>
                <label for="gambar">Masukkan gambar anda : </label>
                <input type="file" id="gambar" name="gambar"><br><br>
                <input type="submit" value="submit">
            </form>
        </div>
    @else
        <h2>Update Data Diri</h2>
        <div>
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <label for="nama">Nama : </label>
                <input type="text" id="nama" name="nama" value="{{ $mahasiswa->nama }}"> <br><br>
                <label for="nim">Nomer induk mahasiswa : </label>
                <input type="text" id="nim" name="nim" value="{{ $mahasiswa->nim }}"> <br><br>
                <label for="prodi">Program studi : </label>
                <input type="text" id="prodi" name="prodi" value="{{ $mahasiswa->prodi }}"><br><br>
                <label for="gambar">Masukkan gambar anda : </label>
                <input type="file" id="gambar" name="gambar"><br><br>
                <button type="submit">submit</button>
            </form>
        </div>
    @endif
@endsection
