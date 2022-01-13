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

        <a href="/harga/create" class="btn btn-primary">Tambah Harga</a>
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($prizes as $prize)    
                <tr>
                    <td>{{ $prize->harga_satuan }}</td>
                    <td>
                        <a class="btn btn-primary" href="/view/update/{{ $prize->id_harga }}">View</a>
                        <a class="btn btn-info" href="/harga/update/{{ $prize->id_harga }}">Edit</a>
                        <a class="btn btn-danger" href="/harga/update/{{ $prize->id_harga }}">Delete</a>
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
