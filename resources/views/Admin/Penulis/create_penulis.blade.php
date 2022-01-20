@extends('Layout.main_admin')

@section('container')

<div class="values">

    <div class="board d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="/penulis/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_penulis" class="form-label">Umur Penulis</label>
                    <input type="text" name="nama_penulis" class="form-control @error('nama_penulis') is-invalid @enderror" id="nama_penulis" placeholder="Nama Penulis" value="{{ old('nama_penulis') }}">
                    @error('nama_penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="umur_penulis" class="form-label">Umur Penulis</label>
                    <input type="number" name="umur_penulis" class="form-control @error('umur_penulis') is-invalid @enderror" id="umur_penulis" placeholder="Ex. 16" value="{{ old('umur_penulis') }}">
                    @error('umur_penulis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tambah Penulis</button>
            </form>
        </div>
    </div>
</div>

@endsection

