@extends('Layout.main_admin')

@section('container')

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
                    <div class="col-md-4 mb-3">
                        <label for="bukuId" class="form-label">Judul Buku</label>
                        <select class="form-select" name="bukuId" id="bukuId">
                            @foreach ($books as $buku)
                                @if(old('bukuId') == $buku->id)
                                    <option data-harga="{{ $buku->harga->harga_satuan }}" value="{{ $buku->id }}" selected>{{ $buku->judul_buku }}</option>
                                @else
                                    <option data-harga="{{ $buku->harga->harga_satuan }}" value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Input Id Pembelian --}}
                    <input type="hidden" name="pembelianId" id="pembelianId" value="{{ $pembelian->id }}">


                <div class="col-md-4 mb-3">
                    <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                    <input type="number" name="jumlah_beli" class="form-control @error('jumlah_beli') is-invalid @enderror" id="jumlah_beli">
                    @error('jumlah_beli')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3 mb-3">
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
                        <a href="#" data-bs-toggle="modal" data-bs-target="#ModalUpdate{{ $cart->id }}" class="btn btn-warning text-white">Update</a>
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
    <form action="/pembelian/update/{{ $pembelian->id }}" method="POST">
        @method('put')
        @csrf
        <input type="hidden" name="id" id="id" value="{{ $pembelian->id }}">  
        <input type="hidden" name="total_harga" id="total_harga" value="{{ $totals->total_harga }}">  
        <input type="hidden" name="jumlah_beli" id="jumlah_beli" value="{{ $totals->buku }}">  
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" class="btn btn-primary">Pembayaran</button>
        </div>
    </form>

    {{-- Memanggil Modal Update --}}
    @include('Admin/Keranjang Buku/Modals.update_keranjang')

    {{-- Memanggil Modal Delete --}}
    @include('Admin/Keranjang Buku/Modals.delete_keranjang')

    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
$("[name='jumlah_beli']").on('input', function(e) {
    e.preventDefault()
    harga = $("[name='bukuId'] option:selected").data('harga')
    qty = $(this).val()
    $("[name='harga_buku']").val(harga * qty)
})
</script>

@endsection