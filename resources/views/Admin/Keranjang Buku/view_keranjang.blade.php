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

        <form action="/keranjang-obat/create" method="POST">
            @csrf
                <div class="d-flex justify-content-evenly">
                    <div class="col-md-5 mb-3">
                        <label for="bukuId" class="form-label">Judul Buku</label>
                        <select class="form-select" name="bukuId" id="bukuId">
                            @foreach ($books as $buku)
                                @if(old('bukuId') == $buku->id)
                                    <option value="{{ $buku->id }}" selected>{{ $buku->judul_buku }}</option>
                                @else
                                    <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Input Id Pembelian --}}
                        <input type="hidden" name="pembelianId" id="pembelianId" value="{{ $pembelian->id }}">


                <div class="col-md-5 mb-3">
                    <label for="harga_obat" class="form-label">Harga Obat</label>
                    <input type="number" name="harga_obat" class="form-control @error('harga_obat') is-invalid @enderror" id="harga_obat" readonly>
                    @error('harga_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-evenly mt-3">
                <button type="submit" class="btn btn-primary">Tambah Isi Keranjang</button>
            </div>
        </form>

    </div>
</div>
@endsection
