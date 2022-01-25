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

        <h1>Keranjang</h1>    

    </div>
</div>
@endsection
