@foreach ($carts as $cart)
{{-- Modal Update --}}
<div class="modal fade" id="ModalUpdate{{ $cart->id }}" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/keranjang-buku/update/{{ $cart->id }}" method="POST">
                    @method('put')
                    @csrf
                    
                <!-- Awal Input Item -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" value="{{  $cart->buku->judul_buku }}" disabled>
                    </div>

                    {{-- Input Hidden --}}
                        <input type="hidden" name="harga_buku" id="harga_buku" value="{{ $cart->buku->harga->harga_satuan }}">    
                        <input type="hidden" name="pembelianId" id="pembelianId" value="{{ $cart->pembelianId }}">    
                        <input type="hidden" name="bukuId" id="bukuId" value="{{ $cart->bukuId }}">      

                    <div class="col-md-6 mb-3">
                        <label for="jumlah_beli" class="form-label">Jumlah Beli</label>
                        <input type="number" name="jumlah_beli" class="form-control @error('jumlah_beli') is-invalid @enderror" id="jumlah_beli" placeholder="1 2 3..." value="{{ old('jumlah_beli', $cart->jumlah_beli) }}">
                        @error('jumlah_beli')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Update Data</button>
                </form>
              </div>
        </div>

    </div>
</div>
@endforeach