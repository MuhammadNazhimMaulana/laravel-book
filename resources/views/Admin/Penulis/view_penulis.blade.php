@extends('Layout.main_admin')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
        </div>
    </div>

    <div class="board">

        {{-- Jikalau berhasil Tambah data --}}
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Jikalau berhasil Ubah data --}}
        @if(session()->has('success-update'))
        <div class="alert alert-success" role="alert">
            {{ session('success-update') }}
        </div>
        @endif

        {{-- Jikalau berhasil Hapus data --}}
        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <a href="/penulis/create" class="btn btn-primary">Tambah Penulis</a>
        <a href="/penulis/excel" class="btn btn-success">Download Excel</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Nama Penulis</td>
                    <td>Umur Penulis</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($writers as $writer)    
                <tr>
                    <td>{{ $writer->nama_penulis }}</td>
                    <td>{{ $writer->umur_penulis }}</td>
                    <td>
                        <a class="btn btn-primary" href="/view/update/{{ $writer->id }}">View</a>
                        <a class="btn btn-info" href="/penulis/update/{{ $writer->id }}">Edit</a>
                        <form action="/penulis/delete/{{ $writer->id }}" method="POST" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mt-5">
        </div>

    </div>
</div>
@endsection
