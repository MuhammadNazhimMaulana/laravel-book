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