@extends('layouts.app')

@section('content')
    <div>
        <table style="text-align:left ;border:1px solid;border-collapse: collapse;">
            <tr>
                <th style="border:1px solid; padding:10px; text-align:center">No</th>
                <th style="border:1px solid; padding:10px; text-align:center">Nama</th>
                <th style="border:1px solid; padding:10px; text-align:center">Nim</th>
                <th style="border:1px solid; padding:10px; text-align:center">Prodi</th>
                <th style="border:1px solid; padding:10px; text-align:center">Gambar</th>
                <th style="border:1px solid; padding:10px; text-align:center">Operasi</th>
            </tr>
            @foreach ($mahasiswa as $mhs)
                <tr>
                    <td style="border:1px solid; padding:10px;">{{ $loop->iteration }}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mhs->nama }}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mhs->nim }}</td>
                    <td style="border:1px solid; padding:10px;">{{ $mhs->prodi }}</td>
                    <td style="border:1px solid; padding:10px;"><img src="{{$mhs->gambar}}" style="width:100px;" alt=""></td>
                    <td style="border:1px solid; padding:10px;">
                        <form id="{{$mhs->id}}" action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="post"
                            style="display: none;"> @method('delete') @csrf </form>
                        <button>
                            <a href="{{ route('mahasiswa.show', $mhs->id) }}"">detail</a>
                        </button>
                        <button>
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}"">edit</a>
                        </button>
                        <button>
                            <a href="javascript:void(0)" onclick="document.getElementById('{{$mhs->id}}').submit()">delete</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
