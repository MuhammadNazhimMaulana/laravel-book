@extends('Layout.main_admin')

@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<div class="values">

    <div class="board">

        {{-- Jikalau berhasil Tambah data --}}
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Jikalau Ada yang Double --}}
        @if(session()->has('tambah-double'))
        <div class="alert alert-danger" role="alert">
            {{ session('tambah-double') }}
        </div>
        @endif

        {{-- Jikalau Berhasil tambah Buku --}}
        @if(session()->has('success-tambah'))
        <div class="alert alert-success" role="alert">
            {{ session('success-tambah') }}
        </div>
        @endif

        {{-- Sukses Menghapus --}}
        @if(session()->has('danger'))
        <div class="alert alert-danger" role="alert">
            {{ session('danger') }}
        </div>
        @endif

        <form action="/keranjang-buku/create" method="POST">
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
                    <label for="harga_buku" class="form-label">Harga Buku</label>
                    <input type="number" name="harga_buku" class="form-control @error('harga_buku') is-invalid @enderror" id="harga_buku" readonly>
                    @error('harga_buku')
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

    {{-- Tabel Keranjang --}}

    <div class="d-flex justify-content-center mt-3">
        <table class="mt-3" width="100%">
            <thead>
                <tr>
                    <td>Judul Buku</td>
                    <td>Harga Buku</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->buku->judul_buku }}</td>
                    <td>{{ $cart->harga_buku }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $cart->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="1">Total Belanja</td>
                    <td>{{ $totals->total_harga }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Form Final --}}

    {{-- Memanggil Modal Update --}}
    @include('Admin/Keranjang Buku/Modals.delete_keranjang')

    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready(function() {
    
    // Getting prize of medicine and times it with how many that person buy
    $('#bukuId').change(function() {

        // Id Buku
        var bukuId = $('#bukuId').val();

        // Id Pembelian
        var id = $('#pembelianId').val();

        var action = 'get_cost';

        if (bukuId != '') {
            $.ajax({
                url: id + "/harga_buku",
                method: "GET",
                data: {
                    bukuId: bukuId,
                    action: action
                },
                dataType: "JSON",
                success: function(data) {
                    $('#harga_buku').val(data.harga_satuan);
                }
            });

        } else {
            $('#harga_buku').val('');
        }
    });

    });
</script>

@endsection