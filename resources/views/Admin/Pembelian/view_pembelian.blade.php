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

        {{-- Jikalau berhasil Hapus data --}}
        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <form action="/pembelian/create" method="">
            @csrf
            <button class="btn btn-primary">Tambah Pembelian</button>
        </form>
        
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Pembeli</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($buyers as $pembelian)    
                <tr>
                    <td>{{ $pembelian->user->username }}</td>
                    <td>
                        <a class="btn btn-primary" href="/view/update/{{ $pembelian->id }}">View</a>
                        <a class="btn btn-info" href="/pembelian/update/{{ $pembelian->id }}">Edit</a>
                        <form action="/pembelian/delete/{{ $pembelian->id }}" method="POST" class="d-inline">
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
