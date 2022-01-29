@extends('Layout.main_admin')

@section('container')
<div class="values">
    <div class="row justify-content-center">
        <div class="col-md-6">
        </div>
    </div>

    <div class="board">

        {{-- Jikalau berhasil Ubah data --}}
        @if(session()->has('success-update'))
        <div class="alert alert-success" role="alert">
            {{ session('success-update') }}
        </div>
        @endif

        <form action="/pembelian/create" method="">
            @csrf
            <button class="btn btn-primary">Tambah Pembelian</button>
        </form>
        
        <div class="d-flex justify-content-end mt-5">
        </div>

    </div>
</div>
@endsection
